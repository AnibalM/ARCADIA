<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;


class Estudiante extends Authenticatable
{										
    
	protected $table = "estudiante";
	protected $fillable = ['idEstudiante', 'Nom_Es', 'Apell_Es', 'Sex_es', 'Celular_Es', 'Edad_es', 
	'Direcc_Es', 'Estrato_Es', 'Email_Es', 'Tp_Documen_Es', 'Nom_Acudiente', 'Tel_Es', 'Estado', 'eliminado'	
	];
	public $timestamps = false;

};
									