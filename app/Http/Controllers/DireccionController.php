<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Direction;
use App\State;


class DireccionController extends Controller
{
    public function __construct()
    {
        # esto me redirige al login si no esta iniciada una sesion
        $this->middleware('auth'); 
    }
    public function index(){

        $data['direccion'] = DB::table('directions')
        ->join('states','states.id','directions.id_estado')
        ->join('municipios','municipios.id','directions.id_municipio')
        ->join('ciudads','ciudads.id','directions.id_ciudad')
        ->join('parroquias','parroquias.id','directions.id_parroquia')
        ->get();

        $data['estados'] = State::all();

        $data['i'] = 1;

        return 
        view('direccion.index',$data);
    }
    public function create(){
        $data['estados'] = State::all();
        return view('direccion.create',$data);
    }
    public function store(Request $request){
        $direccion              = new Direction;
        $direccion->id_estado      = ucwords($request->estado);
        $direccion->id_municipio   = ucwords($request->municipio);
        $direccion->id_ciudad      = ucwords($request->ciudad);
        $direccion->id_parroquia   = ucwords($request->parroquia);
        $direccion->nro_casa    = ucwords($request->nro_casa);
        $direccion->save();

        return redirect()->route('direccion.index')->with('success','Dirección registrada satisfactoriamente.');    
    }
    public function show($id){
        //
    }
    public function edit($id){
        $data['direccion'] = DB::table('directions')
        ->join('states','states.id','directions.id_estado')
        ->join('municipios','municipios.id','directions.id_municipio')
        ->join('ciudads','ciudads.id','directions.id_ciudad')
        ->join('parroquias','parroquias.id','directions.id_parroquia')
        ->where('directions.id',$id)->first();
        $data['estados'] = State::all();
        return 
        view('direccion.edit',$data);
    }
    public function update(Request $request, $id){

        $request->validate([
            'estado'        => 'required',
            'municipio'     => 'required',
            'ciudad'        => 'required',
            'parroquia'     => 'required',
            'nro_casa'      => 'required'
        ]);
         
        $update = [
            'id_estado'        => ucwords($request->estado), 
            'id_municipio'     => ucwords($request->municipio),
            'id_ciudad'        => ucwords($request->ciudad),
            'id_parroquia'     => ucwords($request->parroquia),
            'nro_casa'      => ucwords($request->nro_casa)
        ];

        Direction::where('id',$id)->update($update);
        
        return redirect()->route('direccion.index')->with('success','Dirección actualizada satisfactoriamente!');
    }
    public function destroy($id){
       Direction::where('id',$id)->delete();
        return redirect()->route('direccion.index')->with('success','Dirección eliminada satisfactoriamente');
    }

}
