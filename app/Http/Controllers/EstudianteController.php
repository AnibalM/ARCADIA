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
	 	$estudiante = Estudiante::select('idEstudiante', 'Nom_Es', 'Apell_Es', 'Edad_es', 'Email_Es', 'Celular_Es', 'Estado');
       		return Datatables::of($estudiante)
            ->addColumn('action', function($estudiante){
                 return '<a href="#" class="btn btn-xs btn-info edit" id="'.$estudiante->idEstudiante.'"><i class="glyphicon
                 glyphicon-edit"></i> Editar</a> <a href="#" class="btn btn-xs btn-danger delete" onclick="eliminar('.$estudiante->idEstudiante.')"><i class="glyphicon
                 glyphicon-edit"></i> Eliminar</a>';
                }) 

       		->make(true);

	 }

	    	 

}//FIN DEL CONTROLADOR
