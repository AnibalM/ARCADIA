<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Area;
use DB;
use DataTables;
use PDF;

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

       		$area = Area::select('idArea', 'Tipo_area', 'Estado');
       		return Datatables::of($area)
       		->make(true);

    	 }

  function guardarArea(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'idarea' => 'required'
            
        ]);

        $error_array = array();
        $success_output = '';
        if ($validation->fails())
        {
            foreach($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages = 'IDENTIFICACION REQUERIDA';
            }
        }
        else
        {
            if($request->get('button_action') == "insert")
            {
                $area = new area([
                    'idArea'    =>  $request->get('idarea'),
                    'Tipo_area'     =>  $request->get('tipoarea'),
                    'Estado'     =>  $request->get('estado')
                    
                ]);
                $area->save();
                $success_output = 'AREA REGISTRADO CON EXITO';
            }          
            
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }
}
