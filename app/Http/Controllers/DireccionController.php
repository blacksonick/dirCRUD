<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

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

        $data['direccion'] = Direction::orderBy('id','desc')->paginate(10);
        $data['i'] = 1;
        return view('direccion.index',$data);
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
        $direccion->calle       = ucwords($request->calle);
        $direccion->avenida     = ucwords($request->avenida);
        $direccion->nro_casa    = ucwords($request->nro_casa);
        $direccion->save();

        return redirect()->route('direccion.index')->with('success','Dirección registrada satisfactoriamente.');    
    }
    public function show($id){
        //
    }
    public function edit($id){
        //
    }
    public function update(Request $request, $id){

        $request->validate([
            'estado'        => 'required',
            'municipio'     => 'required',
            'ciudad'        => 'required',
            'parroquia'     => 'required',
            'calle'         => 'required',
            'avenida'       => 'required',
            'nro_casa'      => 'required'
        ]);
         
        $update = [
            'estado'        => ucwords($request->estado), 
            'municipio'     => ucwords($request->municipio),
            'ciudad'        => ucwords($request->ciudad),
            'parroquia'     => ucwords($request->parroquia),
            'calle'         => ucwords($request->calle),
            'avenida'       => ucwords($request->avenida),
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
