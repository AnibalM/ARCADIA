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
    		return view('reportes.reportes');

    	 }
    	 
}//fin de la clase
