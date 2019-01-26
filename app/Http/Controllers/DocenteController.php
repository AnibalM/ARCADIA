<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Docente;
use App\Asignatura;
use Illuminate\Support\Facades\Validator;
use DB;
use DataTables;
use PDF;
use Illuminate\Validation\Rule;

class DocenteController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');//VErifica si el usuario esta logeado o no...
    }

    public function gestion_docente(Request $request){

        $docentes = $this->cargarDocentes();
        $asignaturas = $this->cargarAsignaturas(); 

        //$datos = ['docentes' => $docentes , 'asignaturas' => $asignaturas];   

        return view('docentes.gestionDocente', compact('asignaturas', 'docentes'));
    }

    public function crear(Request $request){
    	return view('docentes.crear');
    }

    public function index()
    {
        $docente = docente::all('idDocente','Nombre','Apellidos','Tipo_Docente','Telefono');

        return view('docentes.docente', compact('docente'));
    }

  public function pdf()
    {      
        
        $docente = docente::all('idDocente','Nombre','Apellidos','Tipo_Docente','Telefono');
        $pdf = PDF::loadView('docentes.docente', compact('docente'));
        return $pdf->download('listado-docentes.pdf');
    }

    public function docentever($id)
    {
         $docente = docente::select('idDocente','Nombre','Apellidos','Tipo_Docente','Telefono')->where('idDocente', $id)->first();
         $pdfver = PDF::loadView('docentes.docentever', compact('docente')); 
            
         return $pdfver->stream();
    }

    public function cargarDocentes(){

            $docentes = DB::table('docente')
            ->select('idDocente', 'Nombre', 'Apellidos')->where('Estado', 'Habilitado')
            ->where('eliminado', 'false')->where('ADMIN', '0')          
            ->get();            
             return $docentes;


            } 

    public function cargarAsignaturas(){

            $asignatura = DB::table('asignatura')
            ->select('idAsignatura', 'Nombre_Asignatura')->where('Estado', 'Habilitado')           
            ->get();            
             return $asignatura;
                
            }    


    function guardar(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'idDocente' => 'required',            
            'Email' => [
                'required',
                 Rule::unique('docente')->ignore($request->idDocente,'idDocente'),
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

                $id_docente = docente::select('idDocente')->where('idDocente',$request->idDocente)->first();
                if ($id_docente)
                {
                    $error_array[] = "Este identificacion ya está registrada";
                }
                else{
                $docente = new docente([
                    'idDocente'    =>  $request->get('idDocente'),
                    'Nombre'     =>  $request->get('nombre'),
                    'Apellidos'     =>  $request->get('apellido'),
                    'Tipo_Docente'     =>  $request->get('tipo'),
                    'Email'     =>  $request->get('Email'),
                    'password'     =>  bcrypt($request->get('contrasena')),
                    'Estado'   => $request->get('Estado')
                ]);
                $docente->save();
                $success_output = 'DOCENTE REGISTRADO CON EXITO';

                }
                    }

                elseif($request->get('button_action') == "update") 
                    {
                
                $docente = Docente::where("idDocente", $request->docente_id)->first();
                $docente->idDocente = $request->get('idDocente');
                $docente->Nombre = $request->get('nombre');
                $docente->Apellidos = $request->get('apellido');               
                $docente->Tipo_Docente = $request->get('tipo');
                $docente->Email = $request->get('Email');
                $docente->password = bcrypt($request->get('contrasena'));
                $docente->Estado = $request->get('Estado');
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

       $docentes = docente::select('idDocente','Nombre', 'Apellidos', 'Tipo_Docente','Email', 'Estado')
       ->where('ADMIN', '0')->where('eliminado', 'false');
       return Datatables::of($docentes)
       ->editColumn('Estado', function($docentes){
        $habilitado = '<span class="badge badge-success">Habilitado</span>'; 
        $deshabilitado = '<span class="badge badge-warning">Deshabilitado</span>';       
        if ($docentes->Estado == 'Habilitado') return $habilitado;
        else return $deshabilitado;
       })
       ->editColumn('action', function($docentes){

        return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$docentes->idDocente.'"><i class="glyphicon
        glyphicon-edit"></i> Editar</a> <a href="#" class="btn btn-xs btn-danger delete" onclick="eliminar('.$docentes->idDocente.')"><i class="glyphicon
        glyphicon-edit"></i> Eliminar</a> <a class="btn btn-outline-info" href="docente-ver/'.$docentes->idDocente.'"><i class="glyphicon
        glyphicon-edit"></i> Ver</a>';


       })
       ->rawColumns(['action', 'Estado'])
       ->make(true);
    }



    function fetch(Request $request)
    {

        $id= $request->input('id');
        $docente = Docente::where("idDocente", $id)->first();


       return response()->json(["idDocente" => "$docente->idDocente","Nombre" => "$docente->Nombre",
        "Apellidos" => "$docente->Apellidos", "tipo" => "$docente->Tipo_Docente", "Email" => "$docente->Email",
         "Estado" => "$docente->Estado"
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
    	DB::table('docente')->where('idDocente', $request->id)
        ->update([

            'eliminado' => 'true'
        ]);

        DB::table('docente_has_asignatura')->where('Docente_idDocente', $request->id)
        ->update([

            'Estado' => 'libre',
            'fin' => date('Y-m-d')
        ]);

    	return response()->json(["message" => "DOCENTE ELIMINADO CON EXITO"]);
    }

   /* public function editar($id){
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
    }*/
}


