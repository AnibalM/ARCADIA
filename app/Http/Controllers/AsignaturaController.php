<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Request\AreaRequest;
use App\Asignatura;
use DB;
use DataTables;
use PDF;
use Illuminate\Validation\Rule;


class AsignaturaController extends Controller
{
  
  		public function __construct()
    	 {
    		$this->middleware('auth');//Verifica si el usuario esta logeado o no...
		 }

		 public function cargarAreas(){

		 	$areas = DB::table('area')
		 	->select('idArea', 'Tipo_area')->where('Estado', 'Habilitado')
		 	->get();
		 	 return $areas;
		 }


		 public function gestion_asignatura(Request $request)
		 {

		 	$areas = $this->cargarAreas();
		 	return view('asignatura.gestionAsignatura', compact('areas'));
		 	
		 }

		 public function listarAsignatura(Request $request)
		 {

		 	$asignatura = DB::table('asignatura')
		 				  ->join('area', 'asignatura.Area_idArea', '=', 'area.idArea')
		 				  ->select('idAsignatura', 'Nombre_Asignatura', 'Tipo_area', 'asignatura.Estado')
		 				  ->get();
		 	
		 	return Datatables::of($asignatura)
            ->editColumn('Estado', function($docentes){
              $habilitado = '<span class="badge badge-success">Habilitado</span>'; 
              $deshabilitado = '<span class="badge badge-warning">Deshabilitado</span>';       
              if ($docentes->Estado == 'Habilitado') return $habilitado;
              else return $deshabilitado;
              })
            ->addColumn('action', function($asignatura){
                 return '<a href="#" class="btn btn-xs btn-info edit" id="'.$asignatura->idAsignatura.'"><i class="glyphicon
                 glyphicon-edit"></i> Editar</a> <a href="#" class="btn btn-xs btn-danger delete" id="'.$asignatura->idAsignatura.'" ><i class="glyphicon
                 glyphicon-edit"></i> Eliminar</a>';
                }) 
            ->rawColumns(['action', 'Estado']) 

       		->make(true);	

		 }

		function guardarAsignatura(Request $request)
        {                      
            $validation = Validator::make($request->all(), [
            'idAsignatura' => 'required',
            'estado' => 'required',
            'Area_idArea' => 'required',
            'Nombre_Asignatura' => [
                'required',
                 Rule::unique('asignatura')->ignore($request->idAsignatura,'idAsignatura')
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
            if($request->get('button_action') == "insert"){

                $validar = asignatura::select('idAsignatura')->where('idAsignatura',$request->idAsignatura)->first();
                if ($validar){
                    $error_array[] = "Este id de asignatura ya se encuentra registrado";
                } else {
                $asignatura = new Asignatura([
                    'idAsignatura'    =>  $request->get('idAsignatura'),
                    'Nombre_Asignatura'     =>  $request->get('Nombre_Asignatura'),
                    'Area_idArea' => $request->get('Area_idArea'),
                    'Estado'     =>  $request->get('estado')                    
                ]);
                $asignatura->save();
                $success_output = 'ASIGNATURA REGISTRADA CON EXITO';
                }
            }
             if($request->get('button_action') == "update") 
             {                
                DB::table('asignatura')->where("idAsignatura", $request->asignatura_id)
                ->update([
                    'idAsignatura'    =>  $request->get('idAsignatura'),
                    'Nombre_Asignatura'     =>  $request->get('Nombre_Asignatura'),
                    'Area_idArea' => $request->get('Area_idArea'),
                    'Estado'     =>  $request->get('estado')
                ]);
                $success_output = 'ASIGNATURA ACTUALIZADA CON EXITO ';
            };            
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    	public function eliminar(Request $request){
        DB::table('asignatura')->where('idAsignatura', $request->id)->delete();
        return response()->json(["message" => "ASIGNATURA ELIMINADA CON EXITO"]);
    }


     function fetch(Request $request)
    {

        $id= $request->input('id');
        $asignatura = asignatura::where("idAsignatura", $id)->first();


       return response()->json(["idAsignatura" => "$asignatura->idAsignatura","Nombre_Asignatura" => 
       	"$asignatura->Nombre_Asignatura", "Area_idArea" => "$asignatura->Area_idArea", "Estado" => "$asignatura->Estado"
        ]);

    }

		 




		 
  
}
