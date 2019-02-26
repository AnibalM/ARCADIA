<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;



class estudiante_has_curso extends Model
{
   protected $table= "curso_has_estudiante";
   protected $fillable = [ 'curso_idCurso', 'estudiante_idEstudiante'
   ]; 
   public $timestamps = false; 
}
