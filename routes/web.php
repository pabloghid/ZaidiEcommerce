<?php



use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;


//usado o match pra pode passar um array com varios parametros sem necessidade de criar varias rotas
Route::match(["get", "post"], "/", [ ProdutoController::class, 'index']) ->name("home");

Route::match(["get", "post"], "/categoria", [ ProdutoController::class, 'categoria']) ->name("categoria");


Route::match(["get", "post"], "/{idcategoria?}/categoria", [ ProdutoController::class, 'categoria']) 
                ->name("categoria_por_id");


Route::match(["get", "post"], "/cadastrar", [ ClienteController::class, 'cadastrar']) ->name("cadastrar");

Route::match(["get", "post"], "/cliente/cadastrar", [ ClienteController::class, 'cadastrarCliente']) 
                ->name("cadastrar_cliente");

Route::match(["get", "post"], "/{idproduto}/carrinho/adicionar", [ ProdutoController::class, 'adicionarCarrinho']) 
                ->name("adicionar_carrinho");

Route::match(["get", "post"], "/carrinho", [ ProdutoController::class, 'verCarrinho']) 
                ->name("ver_carrinho");
                
Route::match(["get", "post"], "/{indice}/excluircarrinho", [ ProdutoController::class, 'excluirCarrinho']) 
                ->name("carrinho_excluir");