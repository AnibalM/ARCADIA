<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\asignatura_has_curso;
use DB;
use Illuminate\Validation\Rule;


class Controllerasignatura_curso extends Controller
{
     public function __construct()
    	 {
    		$this->middleware('auth');//Verifica si el usuario esta logeado o no...
		 }

	function guardarcursoconasignatura(Request $request)
	{

		$validation = Validator::make($request->all(), [
            'Curso_idCurso' => 'required',            
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
                /*$id_curso = asignatura_has_curso::select('Curso_idCurso')->where('Estado', 'ocupado')
                ->where('Curso_idCurso',$request->Curso_idCurso)->first();
                                
                if ($id_curso)
                {
                    $error_array[] = "ESTA ASIGNATURA YA ESTA TOMADA POR OTRO DOCENTE";
                }*/
                //else {
                    
                    $impartir = new asignatura_has_curso([
                        'Curso_idCurso'    =>  $request->get('Curso_idCurso'),
                        'Asignatura_idAsignatura'     =>  $request->get('Asignatura_idAsignatura')
                        

                        
                    ]);
                    $impartir->save();
                    $success_output = 'ASIGNACION REGISTRADA SATISFACTORIAMENTE';
                }
             
                      
        //}
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
      }







	//}	 
}
