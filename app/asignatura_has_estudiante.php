<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;


class asignatura_has_estudiante extends Authenticatable
{
    protected $table= "asignatura_has_estudiante";
	protected $fillable = [ 'Asignatura_idAsignatura', 'Estudiante_idEstudiante', 'Nota1', 'Nota2', 'Nota3', 'Definitiva' 
  	];
  	public $timestamps = false;   
}
