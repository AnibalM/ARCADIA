<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Estudiante;
use Illuminate\Support\Facades\Validator;
use DB;
use DataTables;
use PDF;
use Illuminate\Validation\Rule;

class EstudianteController extends Controller
{
    public function __construct()
    	 {
    		$this->middleware('auth');//Verifica si el usuario esta logeado o no...
		 }

	public function gestion_estudiante(Request $request)
		{

			return view('estudiante.gestionEstudiante');
	    }


	 public function listarEstudiante(Request $request)
	 {
	 	$estudiante = Estudiante::select('idEstudiante', 'Nom_Es', 'Apell_Es', 'Edad_es', 'Email_Es', 'Celular_Es', 'Estado')->where('eliminado', 'false');
       		return Datatables::of($estudiante)
            ->addColumn('action', function($estudiante){
                 return '<a href="#" class="btn btn-xs btn-info edit" id="'.$estudiante->idEstudiante.'"><i class="glyphicon
                 glyphicon-edit"></i> Editar</a> <a href="#" class="btn btn-xs btn-danger delete" onclick="eliminar('.$estudiante->idEstudiante.')"><i class="glyphicon
                 glyphicon-edit"></i> Eliminar</a>';
                }) 

       		->make(true);

	 }


	 public function guardarEstudiante(Request $request)
	 {

	 	//$id = $request->get('idarea');            
            $validation = Validator::make($request->all(), [
            'idEstudiante' => 'required',
            //'Tipo_area' => 'required|unique:area,'.$request->idarea
            'Email_Es' => [
                'required',
                 Rule::unique('estudiante')->ignore($request->idEstudiante,'idEstudiante'),
            ],
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
            	$id_estudiante = estudiante::select('idEstudiante')->where('idEstudiante',$request->idEstudiante)->first();
            	if ($id_estudiante)
            	{
            		$error_array[] = "Este identificacion ya está registrada";
            	}
            	else {
	                $estudiante = new estudiante([
	                    'idEstudiante'    =>  $request->get('idEstudiante'),
	                    'Nom_Es'     =>  $request->get('Nom_Es'),
	                    'Apell_Es'     =>  $request->get('Apell_Es'),
	                    'Sex_es' => $request->get('Sex_es'),
	                    'Celular_Es' => $request->get('Celular_Es'),
	                    'Edad_es' => $request->get('Edad_es'),
	                    'Direcc_Es' => $request->get('Direcc_Es'),
	                    'Estrato_Es' => $request->get('Estrato_Es'),
	                    'Email_Es' => $request->get('Email_Es'),
	                    'Tp_Documen_Es' => $request->get('Tp_Documen_Es'),
	                    'Nom_Acudiente' => $request->get('Nom_Acudiente'),
	                    'Tel_Es' => $request->get('Tel_Es'),
	                    'Estado' => $request->get('Estado')	                    
	                ]);
	                $estudiante->save();
	                $success_output = 'ESTUDIANTE REGISTRADO CON EXITO';
            	}
            } 
         	elseif($request->get('button_action') == "update") 
         	{
                
                DB::table('estudiante')->where("idEstudiante", $request->estudiante_id)
                ->update([
                   'idEstudiante'    =>  $request->get('idEstudiante'),
                        'Nom_Es'     =>  $request->get('Nom_Es'),
                        'Apell_Es'     =>  $request->get('Apell_Es'),
                        'Sex_es' => $request->get('Sex_es'),
                        'Celular_Es' => $request->get('Celular_Es'),
                        'Edad_es' => $request->get('Edad_es'),
                        'Direcc_Es' => $request->get('Direcc_Es'),
                        'Estrato_Es' => $request->get('Estrato_Es'),
                        'Email_Es' => $request->get('Email_Es'),
                        'Tp_Documen_Es' => $request->get('Tp_Documen_Es'),
                        'Nom_Acudiente' => $request->get('Nom_Acudiente'),
                        'Tel_Es' => $request->get('Tel_Es'),
                        'Estado' => $request->get('Estado')
                ]);
                $success_output = 'ESTUDIANTE ACTUALIZADO CON EXITO ';
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
        DB::table('estudiante')->where('idEstudiante', $request->id)
        ->update([

            'eliminado' => 'true'
        ]);
        return response()->json(["message" => "ESTUDIANTE ELIMINADO CON EXITO"]);
    }



     function fetch(Request $request)
    {

        $id= $request->input('id');
        $estudiante = estudiante::where("idEstudiante", $id)->first();


       return response()->json(["idEstudiante" => "$estudiante->idEstudiante","Nom_Es" => "$estudiante->Nom_Es",
        "Apell_Es" => "$estudiante->Apell_Es", "Sex_es" => "$estudiante->Sex_es",
        "Celular_Es" => "$estudiante->Celular_Es", "Edad_es" => "$estudiante->Edad_es", "Direcc_Es" => "$estudiante->Direcc_Es",
        "Estrato_Es" => "$estudiante->Estrato_Es", "Email_Es" => "$estudiante->Email_Es",
        "Tp_Documen_Es" => "$estudiante->Tp_Documen_Es", "Nom_Acudiente" => "$estudiante->Nom_Acudiente", "Tel_Es" => "$estudiante->Tel_Es",
        "Estado" => "$estudiante->Estado"
        ]);

    }


	    	 

}//FIN DEL CONTROLADOR
