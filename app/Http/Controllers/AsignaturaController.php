<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Request\AreaRequest;
use App\Area;
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
		 	->select('idArea', 'Tipo_area')
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
            ->addColumn('action', function($asignatura){
                 return '<a href="#" class="btn btn-xs btn-info edit" id="'.$asignatura->idAsignatura.'"><i class="glyphicon
                 glyphicon-edit"></i> Editar</a> <a href="#" class="btn btn-xs btn-danger delete" onclick="eliminar('.$asignatura->idAsignatura.')"><i class="glyphicon
                 glyphicon-edit"></i> Eliminar</a>';
                }) 

       		->make(true);	

		 }


		 




		 
  
}
