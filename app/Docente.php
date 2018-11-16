<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Docente extends Authenticatable
{
    protected $table = "docente";
    protected $fillable = [
        'idDocente', 'Nombre', 'Apellidos', 'sex', 'Telefono', 'Direccion', 'Email', 'edad', 
        'Tipo_Docente', 'Tipo_Documento', 'Estrato', 'Estado', 'ADMIN'
    ];
    protected $hidden = ['password'];
    public $timestamps = false;
}
