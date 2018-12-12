<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Docente;
use DB;
use DataTables;
use PDF;

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

    public function index()
    {
        $docente = docente::all('idDocente','Nombre','Apellidos','Tipo_Docente','Telefono');

        return view('docentes.docente', compact('docente'));
    }

    public function docentever($id)
    {
         $docente = docente::all('idDocente','Nombre','Apellidos','Tipo_Docente','Telefono')->where('idDocente', $id);
         $pdfver = PDF::loadView('docentes.docentever', compact('docente')); 
        
        return $pdfver->stream();
    }


    public function pdf()
    {      
        
        $docente = docente::all('idDocente','Nombre','Apellidos','Tipo_Docente','Telefono');

        $pdf = PDF::loadView('docentes.docente', compact('docente'));

        return $pdf->download('listado-docentes.pdf');
    }



    function guardar(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'idDocente' => 'required'
            
        ]);

        $error_array = array();
        $success_output = '';
        if ($validation->fails())
        {
            foreach($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages = 'CEDULA REQUERIDA';
            }
        }
        else
        {
            if($request->get('button_action') == "insert")
            {
                $docente = new docente([
                    'idDocente'    =>  $request->get('idDocente'),
                    'Nombre'     =>  $request->get('nombre'),
                    'Apellidos'     =>  $request->get('apellido'),
                    'Tipo_Docente'     =>  $request->get('tipo'),
                    'Email'     =>  $request->get('correo'),
                    'password'     =>  $request->get('contrasena')
                ]);
                $docente->save();
                $success_output = 'DOCENTE REGISTRADO CON EXITO';
            }

            if($request->get('button_action') == "update") {
                
                $docente = Docente::where("idDocente", $request->docente_id)->first();
                $docente->idDocente = $request->get('idDocente');
                $docente->Nombre = $request->get('nombre');
                $docente->Apellidos = $request->get('apellido');               
                $docente->Tipo_Docente = $request->get('tipo');
                $docente->Email = $request->get('correo');
                $docente->password = $request->get('contrasena');
                $docente->save();
                $success_output = 'DOCENTE ACTUALIZADO CON EXITO ';

            };
            
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }


    /*public function guardar(Request $request){
    	$docente = new Docente();
    	$docente->idDocente = $request->cedula;
    	$docente->Nombre = $request->nombres;
    	$docente->Apellidos = $request->apellidos;
    	$docente->Tipo_Docente = $request->tipo;
    	$docente->Email = $request->correo;
    	$docente->password = bcrypt($request->contrasena);
    	$docente->save();
    	return response()->json(["message" => "DOCENTE REGISTRADO CON EXITO"]);
    }*/



    public function listar(){

       $docentes = docente::select('idDocente','Nombre', 'Apellidos', 'Tipo_Docente');
       return Datatables::of($docentes)
       ->addColumn('action', function($docentes){

        return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$docentes->idDocente.'"><i class="glyphicon
        glyphicon-edit"></i> Editar</a> <a href="#" class="btn btn-xs btn-danger delete" onclick="eliminar('.$docentes->idDocente.')"><i class="glyphicon
        glyphicon-edit"></i> Eliminar</a> <a class="btn btn-xs btn-info" href="docente-ver/'.$docentes->idDocente.'"><i class="glyphicon
        glyphicon-edit"></i> Ver</a>';

       })
       ->make(true);
    }



    function fetch(Request $request)
    {

        $id= $request->input('id');
        $docente = Docente::where("idDocente", $id)->first();


       return response()->json(["idDocente" => "$docente->idDocente","Nombre" => "$docente->Nombre",
        "Apellidos" => "$docente->Apellidos", "tipo" => "$docente->Tipo_Docente", "correo" => "$docente->Email"
        ]);

    }



    /*public function listar()
    {

        return Datatables::of(Docente::get())->make(10);


    }*/

    /*public function listar(Request $request){
    	$lista = Docente::select("idDocente","Nombre","Apellidos","Tipo_Docente","Telefono")
    		->orderBy("idDocente","DESC")
    		->get();
    	return $lista;
    }*/

    public function eliminar(Request $request){
    	DB::table('docente')->where('idDocente', $request->id)->delete();
    	return response()->json(["message" => "DOCENTE ELIMINADO CON EXITO"]);
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


