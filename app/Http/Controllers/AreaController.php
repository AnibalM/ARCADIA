<?php

namespace App\Http\Controllers;

//use Validator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Request\AreaRequest;
use App\Area;
use DB;
use DataTables;
use PDF;
//use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rule;

class AreaController extends Controller
{
    	 public function __construct()
    	 {
    		$this->middleware('auth');//Verifica si el usuario esta logeado o no...
		 }

    	 public function gestion_area(Request $request)
    	 {
    		return view('areas.gestionArea');

    	 }

    	 public function listarArea(Request $request)
    	 {
            $area = Area::orderBy($request->orden,$request->formato)->paginate(1);
            return $area;
       		/*return Datatables::of($area)
            ->editColumn('action', function($area){
                 return '<a href="#" class="btn btn-xs btn-info edit" id="'.$area->idArea.'"><i class="glyphicon
                 glyphicon-edit"></i> Editar</a> <a href="#" class="btn btn-xs btn-danger delete" onclick="eliminar('.$area->idArea.')"><i class="glyphicon
                 glyphicon-edit"></i> Eliminar</a>';
                }) 

       		->make(true);*/

    	 }

         
  function guardarArea(Request $request)
        {

            //$id = $request->get('idarea');            
            $validation = Validator::make($request->all(), [
            'idArea' => 'required',
            //'Tipo_area' => 'required|unique:area,'.$request->idarea
            'Tipo_area' => [
                'required',
                 Rule::unique('area')->ignore($request->idArea,'idArea'),
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
            	$id_area = area::select('idArea')->where('idArea',$request->idArea)->first();
            	if ($id_area)
            	{
            		$error_array[] = "Este id de area ya está registrado";
            	}
            	else {
	                $area = new area([
	                    'idArea'    =>  $request->get('idArea'),
	                    'Tipo_area'     =>  $request->get('Tipo_area'),
	                    'Estado'     =>  $request->get('estado')
	                    
	                ]);
	                $area->save();
	                $success_output = 'AREA REGISTRADA CON EXITO';
            	}
            } 
         	elseif($request->get('button_action') == "update") 
         	{
                
                DB::table('area')->where("idArea", $request->area_id)
                ->update([
                    'idArea' => $request->get('idArea'),
                    'Tipo_area' => $request->get('Tipo_area'),
                    'Estado' => $request->get('estado')
                ]);
                $success_output = 'AREA ACTUALIZADA CON EXITO ';
            };            
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    public function eliminar(Request $request){
        DB::table('area')->where('idArea', $request->id)->delete();
        return response()->json(["message" => "AREA ELIMINADA CON EXITO"]);
    }


    function fetch(Request $request)
    {

        $id= $request->input('id');
        $area = area::where("idArea", $id)->first();


       return response()->json(["idArea" => "$area->idArea","Tipo_area" => "$area->Tipo_area",
        "Estado" => "$area->Estado"
        ]);

    }


}
