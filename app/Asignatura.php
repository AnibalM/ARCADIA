<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Authenticatable
{
	protected $table= "asignatura";
	protected $fillable = [ 'idAsignatura', 'Nombre_Asignatura', 'Area_idArea', 'Estado'
	];

	public $timestamps = false;
}
