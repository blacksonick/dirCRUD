<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parroquia;
class ParroquiaController extends Controller
{
    public function obtener_parroquias($id){
    	return Parroquia::where('id_municipio',$id)->get();
    }
}
