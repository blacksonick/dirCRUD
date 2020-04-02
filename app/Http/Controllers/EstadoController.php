<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
class EstadoController extends Controller
{
    public function index()
    {   
        $data['estados'] = State::all();

        $data['i'] = 1;
        return view('estado.index',$data);
    }

    public function create()
    {
        return view('estado.create');
    }

    public function store(Request $request)
    {
        $direccion              = new State;
        $direccion->estado      = ucwords($request->estado);
        $direccion->save();

        return redirect()->route('estado.index')->with('success','Estado registrado satisfactoriamente.');    
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
