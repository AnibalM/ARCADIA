<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


class ReporteController extends Controller
{
    public function __construct(){
        $this->middleware('auth');//VErifica si el usuario esta logeado o no...
    }

    public function gestion_reporte(Request $request)
    	 {
    	 	$edades = $this->cargarEdades();
    		return view('reportes.reportes',compact('edades'));

    	 }




    public function cargarEdades()
 	 {
  			$edades = DB::table('docente')  
  			->select('edad', DB::raw('count(*) as total'))
  			->groupBy('edad')        
            ->get();            
             return $edades;                
  	} 
  		

    	 
}//fin de la clase
