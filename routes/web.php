<?php
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('/prueba', function(){
//return View('docentes.prueba');
//});	

//Route::get('pdf', function(){
//$pdf = PDF::loadView('docentes.prueba');
//return $pdf->download();
//})->name('pdf');

Route::get('docente', 'DocenteController@index')->name('docente');
Route::get('pdf', 'DocenteController@pdf')->name('docente.pdf');

Route::get('docente-ver/{id}', 'DocenteController@docentever')->name('docente.ver');
Route::get('pdfver', 'DocenteController@pdfver')->name('docentever.pdf');



Route::any('login', 'Auth\LoginController@login')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('dashboard-admin', 'HomeController@dashboard_admin')->name('home.admin')->middleware('auth');
Route::get('dashboard-docente', 'HomeController@dashboard_docente')->name('home.docente')->middleware('auth');


//RUTAS AREAS
Route::get('gestion-area', 'AreaController@gestion_area')->name('area.gestion')->middleware('auth');
Route::get('listar-area', 'AreaController@listarArea')->name('listar.area')->middleware('auth');
Route::post('guardar-area', 'AreaController@guardarArea')->name('guardar.area')->middleware('auth');
Route::post('eliminar-area', 'AreaController@eliminar')->name('eliminar.area')->middleware('auth');
Route::get('actualizar-area', 'AreaController@fetch')->name('fetch.area')->middleware('auth');;

//FIN RUTAS AREAS

//RUTAS ASIGNATURAS

Route::get('gestion-asignatura', 'AsignaturaController@gestion_asignatura')->name('asignatura.gestion')->middleware('auth');
Route::get('listar-asignatura', 'AsignaturaController@listarAsignatura')->name('listar.asignatura')->middleware('auth');
//Route::get('cargar-areas', 'AsignaturaController@cargarAreas')->name('cargar.areas');
//Route::get('cargar-areas', 'AsignaturaController@cargarAreas')->name('cargar.area')->middleware('auth');
//FIN RUTAS ASIGNATURAS

//RUTAS DEL DOCENTE
Route::get('gestion-docente', 'DocenteController@gestion_docente')->name('docente.gestion')->middleware('auth');
Route::post('guardar-docente', 'DocenteController@guardar')->name('guardar.docente')->middleware('auth');
Route::get('listar-docentes', 'DocenteController@listar')->name('listar.docentes')->middleware('auth');
Route::get('update-docente', 'DocenteController@fetch')->name('fetch.docentes')->middleware('auth');;
Route::post('eliminar-docente', 'DocenteController@eliminar')->name('eliminar.docente')->middleware('auth');

//FIN RUTAS DOCENTES


//RUTAS DE LA CRUD DE PRACTICA....
Route::get('crear-docente', 'DocenteController@crear')->name('crear.docente')->middleware('auth');
Route::get('editar-docente/{id}', 'DocenteController@editar')->name('editar.docente')->middleware('auth');
Route::post('actualizar-docente', 'DocenteController@actualizar')->name('actualizar.docente')->middleware('auth');
//FIN RUTAS PRACTICAS