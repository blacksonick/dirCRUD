<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ciudad;
class CiudadController extends Controller
{
    public function obtener_ciudades($id){
    	return Ciudad::where('id_estado',$id)->get();
    }
}
