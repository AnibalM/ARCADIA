<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class curso_has_docente extends Authenticatable
{
    //
   protected $table= "curso_has_docente";
   protected $fillable = ['curso_idCurso', 'docente_idDocente'
   ]; 
   public $timestamps = false;
}
