<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Produto;
use App\Http\Requests\ProdutoRequest;

class ProdutoController extends Controller
{
    public function index() {
        $data = [];

        //Buscar todos os produtos
        //select * from produtos
        $listaProdutos = \App\Models\Produto::all();
        $data["lista"] = $listaProdutos;

        return view("home", $data);
    }
    
    public function indexAdmin() {
        $produtos = Produto::all();
        return view('produtos.index', ['produtos'=>$produtos]);

    }

    public function create() {
        $categorias = Categoria::all();
        $marcas = Marca::all();
        return view('produtos.create', ['categorias'=>$categorias, 'marcas'=>$marcas]);
    }

    public function store(Request $request) {
        $novo_produto = $request->all();
        Produto::create($novo_produto);

        return redirect()->route('produtosAdmin');
    }
    
    public function edit($id){
        $produto = Produto::find($id);
        $categorias = Categoria::all();
        $marcas = Marca::all();
        return view('Produtos.edit', compact(['produto', 'categorias', 'marcas']));
    }

    public function update(Request $request, $id) {
        Produto::find($id)->update($request->all());
        return redirect()->route('produtosAdmin');
    }

    public function destroy($id) {
        Produto::find($id)->delete();
        return redirect()->route('produtosAdmin');
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
