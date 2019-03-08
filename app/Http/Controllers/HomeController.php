<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard_admin()
    {
        $cursos = DB::table("curso")->select("idCurso","Grado")->where("Estado","Habilitado")->get();
        return view('dashboard.admin',compact("cursos"));
    }
    public function dashboard_docente()
    {
        return view('dashboard.docente');
    }
    public function estadisticas(Request $req) {
        $areas = DB::table("area")->selectRaw("count(0) as cantidad")->first();
        $asignaturas = DB::table("asignatura")->selectRaw("count(0) as cantidad")->first();
        $cursos = DB::table('curso')->selectRaw("count(0) as cantidad")->where('eliminado','false')->first();
        $estudiantes = DB::table('estudiante')->selectRaw("count(0) as cantidad")->where('eliminado','false')->first();
        $docentes = DB::table('docente')->selectRaw("count(0) as cantidad")->where('eliminado','false')->first();
        
        $get_apro = DB::select("select Asignatura_idAsignatura from asignatura_has_estudiante where ((ifnull(Nota1,0)*0.3) + (ifnull(Nota2,0)*0.3) + (ifnull(Nota3,0)*0.3)) >= 3");
        $apro = count($get_apro);

        $get_repro = DB::select("select Asignatura_idAsignatura from asignatura_has_estudiante where ((ifnull(Nota1,0)*0.3) + (ifnull(Nota2,0)*0.3) + (ifnull(Nota3,0)*0.3)) < 3");
        $repro = count($get_repro);

        return response()->json([
            "areas"=>number_format($areas->cantidad),
            "asignaturas"=>number_format($asignaturas->cantidad),
            "cursos"=>number_format($cursos->cantidad),
            "estudiantes"=>number_format($estudiantes->cantidad),
            "docentes"=>number_format($docentes->cantidad),
            "apro_repro"=>[$apro,$repro],
        ]);
    }
    public function estadisticas2(Request $req) {
        $get_apro = DB::select("select ((ifnull(Nota1,0)*0.3) + (ifnull(Nota2,0)*0.3) + (ifnull(Nota3,0)*0.3)) as def from asignatura_has_estudiante where ((ifnull(Nota1,0)*0.3) + (ifnull(Nota2,0)*0.3) + (ifnull(Nota3,0)*0.3)) >= 3 and curso_idCurso = $req->curso");
        $apro = [];
        foreach ($get_apro as $aux) {
            array_push($apro, $aux->def);
        }

        $get_repro = DB::select("select ((ifnull(Nota1,0)*0.3) + (ifnull(Nota2,0)*0.3) + (ifnull(Nota3,0)*0.3)) as def from asignatura_has_estudiante where ((ifnull(Nota1,0)*0.3) + (ifnull(Nota2,0)*0.3) + (ifnull(Nota3,0)*0.3)) < 3 and curso_idCurso = $req->curso");
        $repro = [];
        foreach ($get_repro as $aux) {
            array_push($repro, $aux->def);
        }

        return response()->json(["apro"=>$apro,"repro"=>$repro]);
    }
}
