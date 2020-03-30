<?php

namespace App\Http\Controllers;
use App\Direccion;
use Illuminate\Http\Request;

class DireccionController extends Controller
{
    public function index()
    {

        $data['direccion'] = Direccion::orderBy('id','desc')->paginate(10);
        $data['i'] = 1;
        return view('direccion.index',$data);
    }
    public function create()
    {
        return view('direccion.create');
    }
    public function store(Request $request)
    {
        $direccion              = new Direccion;
        $direccion->estado      = ucwords($request->estado);
        $direccion->municipio   = ucwords($request->municipio);
        $direccion->ciudad      = ucwords($request->ciudad);
        $direccion->parroquia   = ucwords($request->parroquia);
        $direccion->calle       = ucwords($request->calle);
        $direccion->avenida     = ucwords($request->avenida);
        $direccion->nro_casa    = ucwords($request->nro_casa);
        $direccion->save();

        return redirect()->route('direccion.index')->with('success','Dirección registrada satisfactoriamente.');    
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {

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

        Direccion::where('id',$id)->update($update);
        
        return redirect()->route('direccion.index')->with('success','Dirección actualizada satisfactoriamente!');
    }
    public function destroy($id)
    {
       Direccion::where('id',$id)->delete();
        return redirect()->route('direccion.index')->with('success','Dirección eliminada satisfactoriamente');
    }
}
