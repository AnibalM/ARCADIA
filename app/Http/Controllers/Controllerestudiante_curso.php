<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Validation\Rule;
use App\curso_has_estudiante;

class Controllerestudiante_curso extends Controller
{
    public function __construct()
    	 {
    		$this->middleware('auth');//Verifica si el usuario esta logeado o no...
		 }

	function guardarCursoconestudiante(Request $request)
		{

		      $validation = Validator::make($request->all(), [
              'curso_idCursoestudiante' => 'required',  
              'estudiante_idEstudiante' => 'required'          
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
                $validar = curso_has_estudiante::all()
                ->where('estudiante_idEstudiante',$request->estudiante_idEstudiante)
                ->where('curso_idCurso',$request->curso_idCursoestudiante)->first();
                                
                if ($validar)
                {
                    $error_array[] = "ESTE ESTUDIANTE YA HA SIDO ASOCIADO A ESTE CURSO";
                }
                else {                   
                        $impartir = new curso_has_estudiante([
                        'curso_idCurso'    =>  $request->get('curso_idCursoestudiante'),
                        'estudiante_idEstudiante' =>  $request->get('estudiante_idEstudiante')  
                    ]);
                    $impartir->save();
                    $success_output = 'ASIGNACION REGISTRADA SATISFACTORIAMENTE';
                }           
                      
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
      }


		 
}
