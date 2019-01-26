<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\asignatura_has_curso;
use DB;
use Illuminate\Validation\Rule;


class Controllerasignatura_curso extends Controller
{
     public function __construct()
    	 {
    		$this->middleware('auth');//Verifica si el usuario esta logeado o no...
		 }

		 
}
