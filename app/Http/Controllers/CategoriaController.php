<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index() {
        $categorias = Categoria::all();
        return view('categorias.index', ['categorias'=>$categorias]);

    }

    public function create() {
        return view('categorias.create');
    }

    public function store(Request $request) {
        $nova_categoria = $request->all();
        Categoria::create($nova_categoria);

        return redirect()->route('categoriasAdmin');
    }
    
    public function edit($id){
        $categoria = Categoria::find($id);
        return view('categorias.edit', compact(['categoria']));
    }

    public function update(Request $request, $id) {
        Categoria::find($id)->update($request->all());
        return redirect()->route('categoriasAdmin');
    }

    public function destroy($id) {
        Categoria::find($id)->delete();
        return redirect()->route('categoriasAdmin');
    }
}
