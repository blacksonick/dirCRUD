<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parroquia extends Model
{
    protected $fillable = [
    	'parroquia',
    	'id_municipio'
    ];
}
