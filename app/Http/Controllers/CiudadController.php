<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
class CiudadController extends Controller
{
    public function obtener_ciudades($id){
    	return City::where('id_estado',$id)->get();
    }
}
