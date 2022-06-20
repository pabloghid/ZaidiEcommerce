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

    public function adicionarCarrinho($idproduto = 0, Request $request) {
        //buscar produto pelo id
        $prod = Produto::find($idproduto);

        if ($prod) {
            //encontrou um produto

            //buscar da sessão o carrinho atual

            $carrinho = session('cart', []);

            array_push($carrinho, $prod);
            session(['cart' => $carrinho]);
        }

        return redirect()->route("home");
    }


    public function verCarrinho (Request $request) {

        $carrinho = session('cart', []);
        $data = ['cart' => $carrinho];
        //dump and die
        return view("carrinho", $data);

    }


    public function excluirCarrinho($indice, Request $request) {
        
        $carrinho = session('cart', []);
        //verifica se possui algo, e entao exclui
        if(isset($carrinho[$indice])) {
            unset($carrinho[$indice]);
        }

        session(["cart" => $carrinho]);
        return redirect()->route("ver_carrinho");


    }
}
