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
}
