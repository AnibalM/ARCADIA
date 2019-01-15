<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Curso;
use DB;
use DataTables;
use PDF;
use Illuminate\Validation\Rule;


class CursoController extends Controller
{
  
  	public function __construct()
    	 {
    		$this->middleware('auth');//Verifica si el usuario esta logeado o no...
		 }


	public function gestion_curso(Request $request)
	{
		return view('cursos.gestionCurso');
	}	

	 public function listarCurso(Request $request)
    	 {

       		$curso = Curso::select('idCurso', 'Grado', 'Estado')->where('eliminado', 'false');
       		return Datatables::of($curso)
            ->addColumn('action', function($curso){
                 return '<a href="#" class="btn btn-xs btn-info edit" id="'.$curso->idCurso.'"><i class="glyphicon
                 glyphicon-edit"></i> Editar</a> <a href="#" class="btn btn-xs btn-danger delete" onclick="eliminar('.$curso->idCurso.')"><i class="glyphicon
                 glyphicon-edit"></i> Eliminar</a>';
                }) 

       		->make(true);

    	 }

        public function guardarCurso(Request $request)
          {

    //$id = $request->get('idarea');            
            $validation = Validator::make($request->all(), [
            'idCurso' => 'required',
            //'Tipo_area' => 'required|unique:area,'.$request->idarea
            'Grado' => [
                'required',
                 Rule::unique('curso')->ignore($request->idCurso,'idCurso'),
            ],
            'estado' => 'required'
        ]);

        $error_array = array();
        $success_output = '';
        if ($validation->fails())
        {
            foreach($validation->messages()->getMessages() as $field_name => $messages)
            {

                $error_array[] = $messages;
            }
        }
        else
        {
            if($request->get('button_action') == "insert")
            {
              $id_curso = curso::select('idCurso')->where('idCurso',$request->idCurso)->first();
              if ($id_curso)
              {
                $error_array[] = "Este identificacion ya está registrada";
              }
              else {
                  $curso = new curso([
                      'idCurso'    =>  $request->get('idCurso'),
                      'Grado' => $request->get('Grado'),
                      'Estado' => $request->get('estado')                     
                  ]);
                  $curso->save();
                  $success_output = 'CURSO REGISTRADO CON EXITO';
              }
            } 
          elseif($request->get('button_action') == "update") 
          {
                
                DB::table('curso')->where("idCurso", $request->curso_id)
                ->update([
                   'idCurso'    =>  $request->get('idCurso'),
                      'Grado' => $request->get('Grado'),
                      'Estado' => $request->get('estado')
                ]);
                $success_output = 'CURSO ACTUALIZADO CON EXITO ';
            };            
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
   }


    public function eliminar(Request $request)
     {
        DB::table('curso')->where('idCurso', $request->id)
        ->update([

            'eliminado' => 'true'
        ]);
        return response()->json(["message" => "CURSO ELIMINADO CON EXITO"]);
    }

    function fetch(Request $request)
    {

        $id= $request->input('id');
        $curso = curso::where("idCurso", $id)->first();


       return response()->json(["idCurso" => "$curso->idCurso","Grado" => "$curso->Grado",
        "Estado" => "$curso->Estado"
        ]);

    }


}//FIN DEL CONTROLADOR