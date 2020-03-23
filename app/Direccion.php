<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $fillable = [
    	'estado',
    	'municipio',
    	'ciudad',
    	'parroquia',
    	'calle',
    	'avenida',
    	'nro_casa'
    ];
}
