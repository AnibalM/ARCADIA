<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Nota;
use DB;
use DataTables;
use PDF;
use Illuminate\Validation\Rule;

class NotaController extends Controller
{
   public function __construct()
    {
    		$this->middleware('auth');//Verifica si el usuario esta logeado o no...
	}

	public function gestion_notas(Request $request)
    	 {
        $cursos = $this->cargarCursos();
        $asignaturas = $this->cargarAsignaturas();
    		return view('nota.gestionNotas',compact('cursos','asignaturas'));

    	 }

    public function cargarCursos()
  		{

            $cursos = DB::table('curso')
            ->join('curso_has_docente', 'curso.idCurso', '=', 'curso_has_docente.curso_idCurso') 
            ->join('docente', 'docente.idDocente', '=', 'curso_has_docente.docente_idDocente')      
            ->select('idCurso', 'Grado')->where('docente.idDocente', Auth::user()->idDocente)           
            ->get();            
             return $cursos;                
  		} 

      public function cargarAsignaturas()
      {

            $asignaturas = DB::table('asignatura')
            ->join('docente_has_asignatura', 'asignatura.idAsignatura', '=', 'docente_has_asignatura.Asignatura_idAsignatura') 
            ->join('docente', 'docente.idDocente', '=', 'docente_has_asignatura.Docente_idDocente')      
            ->select('idAsignatura', 'Nombre_Asignatura')->where('docente.idDocente', Auth::user()->idDocente)           
            ->get();            
             return $asignaturas;                
      } 



       public function listarEstudiantesNotas(Request $request)
         {
            $estudiantes = DB::table('estudiante')
            ->join('curso_has_estudiante', 'estudiante.idEstudiante', '=', 'curso_has_estudiante.estudiante_idEstudiante')
            ->select('idEstudiante', 'Nom_Es', 'Apell_Es', 'Email_Es')
            ->where('curso_idCurso', $request->id)->get();  
            return DataTables::of($estudiantes) 
            ->editColumn('definitiva', function($estudiantes) use ($request){
                $notas = DB::table("asignatura_has_estudiante")
                    ->select("Nota1","Nota2","Nota3")
                    ->where("Asignatura_idAsignatura",$request->asignatura)
                    ->where("Estudiante_idEstudiante",$estudiantes->idEstudiante)
                    ->where("curso_idCurso",$request->id)
                    ->first();
                if ($notas) {
                    $nota = ($notas->Nota1 * 0.3) + ($notas->Nota2 * 0.3) + ($notas->Nota3 * 0.4);
                }
                else $nota = "";
                return '<center>'.$nota.'</center>';
            })
            ->editColumn('nota1', function($estudiantes) use ($request){
                $notas = DB::table("asignatura_has_estudiante")
                    ->select("Nota1")
                    ->where("Asignatura_idAsignatura",$request->asignatura)
                    ->where("Estudiante_idEstudiante",$estudiantes->idEstudiante)
                    ->where("curso_idCurso",$request->id)
                    ->first();
                if ($notas) $nota = $notas->Nota1;
                else $nota = "";
                return '<span id="msg_1_'.$estudiantes->idEstudiante.'"></span><img src="'.asset('images/loading.gif').'" class="hide" width="50" height="50" id="loading_1_'.$estudiantes->idEstudiante.'" /><center><input value="'.$nota.'" onkeyup="guardar(1,event,this.value,'.$estudiantes->idEstudiante.')" class="campo_nota" type="text" style="width: 50%;text-align: center;" /></center>';
            })
            ->editColumn('nota2', function($estudiantes) use ($request){
                $notas = DB::table("asignatura_has_estudiante")
                    ->select("Nota2")
                    ->where("Asignatura_idAsignatura",$request->asignatura)
                    ->where("Estudiante_idEstudiante",$estudiantes->idEstudiante)
                    ->where("curso_idCurso",$request->id)
                    ->first();
                if ($notas) $nota = $notas->Nota2;
                else $nota = "";
                return '<span id="msg_2_'.$estudiantes->idEstudiante.'"></span><img src="'.asset('images/loading.gif').'" class="hide" width="50" height="50" id="loading_2_'.$estudiantes->idEstudiante.'" /><center><input value="'.$nota.'" onkeyup="guardar(2,event,this.value,'.$estudiantes->idEstudiante.')" class="campo_nota" type="text" style="width: 50%;text-align: center;" /></center>';
            })
            ->editColumn('nota3', function($estudiantes) use ($request){
                $notas = DB::table("asignatura_has_estudiante")
                    ->select("Nota3")
                    ->where("Asignatura_idAsignatura",$request->asignatura)
                    ->where("Estudiante_idEstudiante",$estudiantes->idEstudiante)
                    ->where("curso_idCurso",$request->id)
                    ->first();
                if ($notas) $nota = $notas->Nota3;
                else $nota = "";
                return '<span id="msg_3_'.$estudiantes->idEstudiante.'"></span><img src="'.asset('images/loading.gif').'" class="hide" width="50" height="50" id="loading_3_'.$estudiantes->idEstudiante.'" /><center><input value="'.$nota.'" onkeyup="guardar(3,event,this.value,'.$estudiantes->idEstudiante.')" class="campo_nota" type="text" style="width: 50%;text-align: center;" /></center>';
            })
            ->rawColumns(['nota1', 'nota2', 'nota3', 'definitiva'])
            ->make(true);
            
         }
         public function guardar_nota(Request $req) {
            DB::beginTransaction();
            try {
                $nota1 = null;
                $nota2 = null;
                $nota3 = null;
                $nota = [];
                if ($req->campo == "1") {
                    $nota1 = $req->nota;
                    $nota = ["nota1" => $req->nota];
                }
                elseif ($req->campo == "2") {
                    $nota2 = $req->nota;
                    $nota = ["nota2" => $req->nota];
                }
                elseif ($req->campo == "3") {
                    $nota3 = $req->nota;
                    $nota = ["nota3" => $req->nota];
                }

                $validar = DB::table("asignatura_has_estudiante")->select("Asignatura_idAsignatura")
                    ->where("Asignatura_idAsignatura",$req->asignatura)
                    ->where("Estudiante_idEstudiante",$req->estudiante)
                    ->where("curso_idCurso",$req->curso)
                    ->first();
                if ($validar != null) {
                    DB::table("asignatura_has_estudiante")
                    ->where("Asignatura_idAsignatura",$req->asignatura)
                    ->where("Estudiante_idEstudiante",$req->estudiante)
                    ->where("curso_idCurso",$req->curso)
                    ->update($nota);
                }
                else {
                    DB::table("asignatura_has_estudiante")->insert([
                        "Asignatura_idAsignatura"=>$req->asignatura,
                        "Estudiante_idEstudiante"=>$req->estudiante,
                        "curso_idCurso"=>$req->curso,
                        "Nota1"=>$nota1,
                        "Nota2"=>$nota2,
                        "Nota3"=>$nota3
                    ]);
                }

                DB::commit();
                return response()->json(["statusCode"=>201,"statusText"=>"Nota guardada"]);
            }
            catch(Exception $ex) {
                DB::rollback();
                return response()->json(["statusCode"=>500,"statusText"=>$ex->getMessage()]);
            }
            catch(PDOException  $ex) {
                DB::rollback();
                return response()->json(["statusCode"=>500,"statusText"=>$ex->getMessage()]);
            }
         }
   
	 

}
