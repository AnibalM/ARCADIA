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
             ->addColumn('action', function($estudiantes){
                 return '<a href="#" class="btn btn-xs btn-success asignar" id="'.$estudiantes->idEstudiante.'"><i class="glyphicon
                 glyphicon-edit"></i> Asignar</a> <a href="#" class="btn btn-xs btn-primary edit" id="'.$estudiantes->idEstudiante.'")"><i class="glyphicon
                 glyphicon-edit"></i> Editar</a>';
                })           
            ->make(true);
            
         }
   
	 

}
