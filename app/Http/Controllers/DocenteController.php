<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Docente;
use DB;
use DataTables;

class DocenteController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');//VErifica si el usuario esta logeado o no...
    }

    public function gestion_docente(Request $request){
        return view('docentes.gestionDocente');
    }

    public function crear(Request $request){
    	return view('docentes.crear');
    }

    public function guardar(Request $request){
    	$docente = new Docente();
    	$docente->idDocente = $request->cedula;
    	$docente->Nombre = $request->nombres;
    	$docente->Apellidos = $request->apellidos;
    	$docente->Tipo_Docente = $request->tipo;
    	$docente->Email = $request->correo;
    	$docente->password = bcrypt($request->contrasena);
    	$docente->save();
    	return response()->json(["message" => "Docente guardado"]);
    }





    public function listar()
    {

        return Datatables::of(Docente::get())->make(true);


    }

    /*public function listar(Request $request){
    	$lista = Docente::select("idDocente","Nombre","Apellidos","Tipo_Docente","Telefono")
    		->orderBy("idDocente","DESC")
    		->get();
    	return $lista;
    }*/

    public function eliminar(Request $request){
    	DB::table('docente')->where('idDocente', $request->id)->delete();
    	return response()->json(["message" => "Eliminado correctamente"]);
    }

    public function editar($id){
    	$docente = Docente::where("idDocente", $id)->first();
    	return view("docentes.editar", compact("docente"));
    }

    public function actualizar(Request $request){
    	$docente = Docente::where("idDocente", $request->cedula)->first();
    	$docente->idDocente = $request->cedula;
    	$docente->Nombre = $request->nombres;
    	$docente->Apellidos = $request->apellidos;
    	$docente->Tipo_Docente = $request->tipo;
    	$docente->Email = $request->correo;
    	if ($request->contrasena != '')
    		$docente->password = bcrypt($request->contrasena);
    	$docente->save();
    	
    	return view("dashboard.admin");
    }
}
