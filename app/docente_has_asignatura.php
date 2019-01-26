<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class docente_has_asignatura extends Authenticatable

{
	
	protected $table= "docente_has_asignatura";
	protected $fillable = [ 'Docente_idDocente', 'Asignatura_idAsignatura', 'inicio', 'fin', 'Estado' 
  	];
  	public $timestamps = false;   
}
