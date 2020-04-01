<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Municipio;

class MunicipioController extends Controller
{
    public function obtener_municipios($id){
    	return Municipio::where('id_estado',$id)->get();
    }
}
