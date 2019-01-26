<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;


class asignatura_has_curso extends Authenticatable

{
	
	protected $table= "asignatura_has_curso";
	protected $fillable = [ 'Asignatura_idAsignatura', 'Curso_idCurso' 
  	];
  	public $timestamps = false;   
}
