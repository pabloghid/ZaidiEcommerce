<?php

namespace App\Models;

class Endereco extends RModel
{
    protected $table = "enderecos";
    protected $fillable = ['logradouro', 'complemento', 'numero', 'cep', 'cidade', 'estado'];
}
