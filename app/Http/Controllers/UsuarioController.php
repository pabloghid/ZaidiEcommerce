<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function logar(Request $request) {
        $data = [];

        if($request->isMethod("POST")) {
            //se entrar aqui é pq o usuario clicou no logar 
            $login = $request->input("login");
            $senha = $request->input("senha");

            $credential = ['login' => $login, 'password' => $senha];

            //logando
            if(Auth::attempt($credential)) {
                return redirect()->route("home");
            }else {
                dd("dados invalidos");
            }
        }

        return view("logar", $data);
    }
     
}
