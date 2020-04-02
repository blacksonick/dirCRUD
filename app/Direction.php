<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    protected $fillable = [
    	'id_estado',
    	'id_municipio',
    	'id_ciudad',
    	'id_parroquia',
    	'nro_casa'
    ];
}
