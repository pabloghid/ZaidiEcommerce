<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Endereco;
use App\Services\ClienteServices;

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
        $usuario->login = $request->input("cpf", "");

        $endereco = new Endereco($values);
        $endereco->logradouro = $request->input("endereço", "");

        $senha = $request->input("password","");
        $usuario->password = \Hash::make($senha); //criptografando senha nativo laravel

        $ClienteServices = new ClienteServices();
        $result = $ClienteServices->salvarUsuario($usuario, $endereco);

        $message = $result["message"];
        $status = $result["status"];
        
        $request->session()->flash($status, "message"); //grav de uma requisicao pra outra

        return redirect()->route("cadastrar");
    }
}
