<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Validation\Rule;
use App\curso_has_docente;

class Controllerdocente_curso extends Controller
{
   
   		 public function __construct()
    	 {
    		$this->middleware('auth');//Verifica si el usuario esta logeado o no...
		 }
		 function guardarCursocondocente(Request $request)
		{

		      $validation = Validator::make($request->all(), [
              'curso_idCursodocente' => 'required',  
              'docente_idDocente' => 'required'          
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
                $validar = curso_has_docente::all()
                ->where('docente_idDocente',$request->docente_idDocente)
                ->where('curso_idCurso',$request->curso_idCursodocente)->first();
                                
                if ($validar)
                {
                    $error_array[] = "ESTE DOCENTE YA HA SIDO ASOCIADO A ESTE CURSO";
                }
                else {                   
                        $impartir = new curso_has_docente([
                        'curso_idCurso'    =>  $request->get('curso_idCursodocente'),
                        'docente_idDocente' =>  $request->get('docente_idDocente')  
                    ]);
                    $impartir->save();
                    $success_output = 'DOCENTE ASIGNADO SATISFACTORIAMENTE';
                }           
                      
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
      }
}
