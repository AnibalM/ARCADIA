<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Area extends Authenticatable
{
  
  protected $table= "area";
  protected $fillable = [ 'idArea', 'Tipo_area', 'Estado' 

  ];
  public $timestamps = false;

}
