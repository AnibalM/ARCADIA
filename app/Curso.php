<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Curso extends Authenticatable
{
   
  protected $table= "curso";
  protected $fillable = [ 'idCurso', 'Grado', 'Estado', 'eliminado'
  ];
  public $timestamps = false; 
}
