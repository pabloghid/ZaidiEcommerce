<?php

namespace App\Services;

use App\Models\Usuario;
use App\Models\Endereco;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ClienteServices
{
    public function salvarUsuario(Usuario $user, Endereco $endereco) {
        try {
            $dbUsuario = Usuario::where("login", $user->login)->orWhere('email', $user->email)->first(); //verif se ja existe esse login
            if($dbUsuario) {
                return ['status' => 'err', 'message' => 'Login ja utilizado no sistema.'];
            }
            DB::beginTransaction(); //iniciando transmissao
            $user->save(); //salvo o usuario
            $endereco->usuario_id = $user->id; //relacionamento
            $endereco->save(); //salva o endereço
            DB::commit(); //confirmando transacao

            return ['status' => '', 'message' => 'Usuario cadastrado com sucesso!'];
        } catch (\Exception $e) {
            Log::error("ERRO", ['file' => 'ClienteService.salvarUsuario', 'message' => $e->getMessage()]);
            DB::rollback(); // se der erro cancela a transacao
            return ['status' => 'err', 'message' => 'Erro ao cadastrar.'];
        }
    }
}
