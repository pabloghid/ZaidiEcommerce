<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function logar(Request $request)
    {

        if ($request->isMethod("POST")) {
            //se entrar aqui é pq o usuario clicou no logar 
            $login = $request->input("login");
            $senha = $request->input("password");

            $credential = ['login' => $login, 'password' => $senha];

            //logando
            if (Auth::attempt($credential)) {
                return redirect()->route("home");
            } else {
                $message = "Dados inválidos";
                $status = 'err';
            }

            $request->session()->flash($status, $message);
        }
        return view("logar");
    }
}
