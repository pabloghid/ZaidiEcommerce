<?php



use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;


//usado o match pra pode passar um array com varios parametros sem necessidade de criar varias rotas
Route::match(["get", "post"], "/", [ProdutoController::class, 'index'])->name("home");

Route::match(["get", "post"], "/categoria", [ProdutoController::class, 'categoria'])->name("categoria");


Route::match(["get", "post"], "/{idcategoria?}/categoria", [ProdutoController::class, 'categoria'])
    ->name("categoria_por_id");


Route::match(["get", "post"], "/cadastrar", [ClienteController::class, 'cadastrar'])->name("cadastrar");

Route::match(["get", "post"], "/cliente/cadastrar", [ClienteController::class, 'cadastrarCliente'])
    ->name("cadastrar_cliente");

Route::match(["get", "post"], "/logar", [UsuarioController::class, 'logar'])
    ->name("logar");


Route::match(["get", "post"], "/{idproduto}/carrinho/adicionar", [ProdutoController::class, 'adicionarCarrinho'])
    ->name("adicionar_carrinho");

Route::match(["get", "post"], "/carrinho", [ProdutoController::class, 'verCarrinho'])
    ->name("ver_carrinho");

Route::match(["get", "post"], "/{indice}/excluircarrinho", [ProdutoController::class, 'excluirCarrinho'])
    ->name("carrinho_excluir");

Route::get('/admin', function () {
        return view('admin.index');
    });

route::group(['prefix' => 'marca'], function () {
    Route::get('{idmarca?}',              ['as' => 'marcas',    'uses' => '\App\Http\Controllers\MarcasController@marcas']);
});

Route::group(['prefix' => 'admin/marcas'], function () {
    Route::get('',              ['as' => 'marcasAdmin',    'uses' => '\App\Http\Controllers\MarcasController@index']);
    Route::get('create',       ['as' => 'marcasAdmin.create',    'uses' => '\App\Http\Controllers\MarcasController@create']);
    Route::post('store',       ['as' => 'marcasAdmin.store',    'uses' => '\App\Http\Controllers\MarcasController@store']);
    Route::get('{id}/destroy',  ['as' => 'marcasAdmin.destroy',    'uses' => '\App\Http\Controllers\MarcasController@destroy']);
    Route::get('{id}/edit',     ['as' => 'marcasAdmin.edit',    'uses' => '\App\Http\Controllers\MarcasController@edit']);
    Route::put('{id}/update',   ['as' => 'marcasAdmin.update',    'uses' => '\App\Http\Controllers\MarcasController@update']);
});

Route::group(['prefix' => 'admin/produtos'], function () {
    Route::get('',              ['as' => 'produtosAdmin',    'uses' => '\App\Http\Controllers\ProdutoController@indexAdmin']);
    Route::get('create',       ['as' => 'produtosAdmin.create',    'uses' => '\App\Http\Controllers\ProdutoController@create']);
    Route::post('store',       ['as' => 'produtosAdmin.store',    'uses' => '\App\Http\Controllers\ProdutoController@store']);
    Route::get('{id}/destroy',  ['as' => 'produtosAdmin.destroy',    'uses' => '\App\Http\Controllers\ProdutoController@destroy']);
    Route::get('{id}/edit',     ['as' => 'produtosAdmin.edit',    'uses' => '\App\Http\Controllers\ProdutoController@edit']);
    Route::put('{id}/update',   ['as' => 'produtosAdmin.update',    'uses' => '\App\Http\Controllers\ProdutoController@update']);
});

Route::group(['prefix' => 'admin/categorias'], function () {
    Route::get('',              ['as' => 'categoriasAdmin',    'uses' => '\App\Http\Controllers\MarcaController@index']);
    Route::get('create',       ['as' => 'categoriasAdmin.create',    'uses' => '\App\Http\Controllers\MarcaController@create']);
    Route::post('store',       ['as' => 'categoriasAdmin.store',    'uses' => '\App\Http\Controllers\MarcaController@store']);
    Route::get('{id}/destroy',  ['as' => 'categoriasAdmin.destroy',    'uses' => '\App\Http\Controllers\MarcaController@destroy']);
    Route::get('{id}/edit',     ['as' => 'categoriasAdmin.edit',    'uses' => '\App\Http\Controllers\MarcaController@edit']);
    Route::put('{id}/update',   ['as' => 'categoriasAdmin.update',    'uses' => '\App\Http\Controllers\MarcaController@update']);
});
