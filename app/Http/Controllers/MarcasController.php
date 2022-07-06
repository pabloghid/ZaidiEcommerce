<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use App\Models\Produto;
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

    public function marcas(Request $request, $idMarca = 0) { 
        $data = [];
        
        $listaMarcas = Marca::all();

        $queryProduto = Produto::limit(10);
        
        if ($idMarca != 0) { 
            $queryProduto->where("marca_id", $idMarca)  ;
        }
    
        $listaProdutos = $queryProduto->get();

        $data["lista"] = $listaProdutos;
        $data["listaMarca"] = $listaMarcas;
        $data["idMarca"] = $idMarca;
        return view("marca", $data);

    }
}
