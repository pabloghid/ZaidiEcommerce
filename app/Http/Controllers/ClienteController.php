<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Endereco;

class ClienteController extends Controller
{
    public function cadastrar (Request $request) {
        $data = [];

        return view("cadastrar", $data);

    }

    public function cadastrarCliente(Request $request) {
        //pega todos os valores do formulario
        $values = $request->all();
        $usuario = new Usuario();
        //o php pega somente os campos que eu setei no 'fillable'
        $usuario->fill($values);

        $endereco = new Endereco($values);
        $endereco->logradouro = $request->input("endereço", "");

        return redirect()->route("cadastrar");
    }
}
