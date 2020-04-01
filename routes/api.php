<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/ciudad/{id}','CiudadController@obtener_ciudades');

Route::get('/municipio/{id}','MunicipioController@obtener_municipios');

Route::get('/parroquia/{id}','ParroquiaController@obtener_parroquias');


