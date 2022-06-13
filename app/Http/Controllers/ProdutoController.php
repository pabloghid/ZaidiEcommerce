<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index(Request $request) {
        $data = [];


        //Buscar todos os produtos
        //select * from produtos
        $listaProdutos = \App\Models\Produto::all();
        $data["lista"] = $listaProdutos;


        return view("home", $data);

    }
                             
    public function categoria(Request $request, $idcategoria = 0) {  //criando uma sobrecarga no metodo
        $data = [];
        //select * from categorias
        $listaCategorias = Categoria::all();

        //select * from produtos
        $queryProduto = Produto::limit(10);
        
        if ($idcategoria != 0) { //SOBRECARGA
            //where categoria_id = $idcategoria
            $queryProduto->where("categoria_id", $idcategoria)  ;
        }
    
        $listaProdutos = $queryProduto->get();

        $data["lista"] = $listaProdutos;
        $data["listaCategoria"] = $listaCategorias;
        $data["idcategoria"] = $idcategoria;
        return view("categoria", $data);

    }
}
