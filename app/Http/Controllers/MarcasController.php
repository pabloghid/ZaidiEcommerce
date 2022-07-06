<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use App\Http\Requests\MarcaRequest;

class MarcasController extends Controller
{
    public function index()
    {
        $marcas = Marca::all();
        return view('marcas.index', ['marcas'=>$marcas]);
    }
    public function create() {
        return view('marcas.create');
    }

    public function store(MarcaRequest $request) {
        $nova_marca = $request->all();
        Marca::create($nova_marca);

        return redirect()->route('marcasAdmin');
    }
    
    public function edit($id){
        $marca = Marca::find($id);
        return view('Marcas.edit', compact('marca'));
    }

    public function update(MarcaRequest $request, $id) {
        Marca::find($id)->update($request->all());
        return redirect()->route('marcasAdmin');
    }

    public function destroy($id) {
        Marca::find($id)->delete();
        return redirect()->route('marcasAdmin');
    }
}
