<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\docente_has_asignatura;
use DB;
use Illuminate\Validation\Rule;

class Controllerdocente_asignatura extends Controller
{
    public function __construct()
    	 {
    		$this->middleware('auth');//Verifica si el usuario esta logeado o no...
		 }


	 function guardardocenteconasignatura(Request $request)
        {


        $validation = Validator::make($request->all(), [
            'Docente_idDocente' => 'required',            
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
                $id_asig = docente_has_asignatura::select('Asignatura_idAsignatura')->where('Estado', 'ocupado')
                ->where('Asignatura_idAsignatura',$request->Asignatura_idAsignatura)->first();
                                
                if ($id_asig)
                {
                    $error_array[] = "ESTA ASIGNATURA YA ESTA TOMADA POR OTRO DOCENTE";
                }
                else {
                    
                    $impartir = new docente_has_asignatura([
                        'Docente_idDocente'    =>  $request->get('Docente_idDocente'),
                        'Asignatura_idAsignatura'     =>  $request->get('Asignatura_idAsignatura'),
                        'inicio' => date('Y-m-d')

                        
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
      }//FIN FUNCION guardardocenteconasignatura       
        

                   
   

	
}//FIN DE LA CLASE 
