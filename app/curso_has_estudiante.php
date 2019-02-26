<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;



class curso_has_estudiante extends Authenticatable
{
   protected $table= "curso_has_estudiante";
   protected $fillable = ['curso_idCurso', 'estudiante_idEstudiante'
   ]; 
   public $timestamps = false; 
}
