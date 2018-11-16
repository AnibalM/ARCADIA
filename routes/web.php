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

Route::any('login', 'Auth\LoginController@login')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('dashboard-admin', 'HomeController@dashboard_admin')->name('home.admin')->middleware('auth');
Route::get('dashboard-docente', 'HomeController@dashboard_docente')->name('home.docente')->middleware('auth');

Route::get('crear-docente', 'DocenteController@crear')->name('crear.docente')->middleware('auth');
Route::post('guardar-docente', 'DocenteController@guardar')->name('guardar.docente')->middleware('auth');
Route::get('listar-docentes', 'DocenteController@listar')->name('listar.docentes')->middleware('auth');
Route::post('eliminar-docente', 'DocenteController@eliminar')->name('eliminar.docente')->middleware('auth');
Route::get('editar-docente/{id}', 'DocenteController@editar')->name('editar.docente')->middleware('auth');
Route::post('actualizar-docente', 'DocenteController@actualizar')->name('actualizar.docente')->middleware('auth');