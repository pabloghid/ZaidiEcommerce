<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $cat = new \App\Models\Categoria(["categoria" => "Geral"]);
        $cat->save();

        $prod = new \App\Models\Produto(['nome'=>'Castanha de Caju Sem Sal Tipo 1', 'valor'=>'44.85', 'foto'=>'img/CajuSemSal.jpg', 'descricao'=>'Castanha de caju sem sal tipo 1. Peso 500G', 'categoria_id'=> $cat->id]);
        $prod->save();

        $prod2 = new \App\Models\Produto(['nome'=>'Chocolate em Po Harald 50% Cacau', 'valor'=>'36.87', 'foto'=>'img/ChocolateEmPo.jpeg', 'descricao'=>'Chocolate em po 50% cacau. Harald. Perfeito para brigadeiro.', 'categoria_id'=> $cat->id]);
        $prod2->save();

        $prod3 = new \App\Models\Produto(['nome'=>'Chocolate Nobre Sicao Ao Leite Barra 1.01KG', 'valor'=>'46.50', 'foto'=>'img/ChocolateSicao.jpeg', 'descricao'=>'Chocolate Nobre ao leite em Barra. Necessita temperagem.', 'categoria_id'=> $cat->id]);
        $prod3->save();

        $prod4 = new \App\Models\Produto(['nome'=>'Coco Congelado 1.01KG', 'valor'=>'19.80', 'foto'=>'img/CocoCongelado.jpeg', 'descricao'=>'Coco Ralado Congelado natural. Necessita cozimento. Excelente para recheios.', 'categoria_id'=> $cat->id]);
        $prod4->save();

        $prod5 = new \App\Models\Produto(['nome'=>'Coco Ralado Seco Médio 01KG', 'valor'=>'44.50', 'foto'=>'img/CocoMedio.png', 'descricao'=>'Coco seco medio integral. Importado da Siri Lanka. Nao possui acucar', 'categoria_id'=> $cat->id]);
        $prod5->save();

        $prod6 = new \App\Models\Produto(['nome'=>'Granulado Confeiteiro Harald Preto 1.01KG', 'valor'=>'15.45', 'foto'=>'mg/GranuladoHarald.jpeg', 'descricao'=>'Chocolate granulado macio preto. Ideal para cobrir brigadeiros.', 'categoria_id'=> $cat->id]);
        $prod6->save();

        $prod7 = new \App\Models\Produto(['nome'=>'Cobertura sabor chocolate Meio Amarga Mavalério Gotas 1KG', 'valor'=>'26.85', 'foto'=>'img/PremiumMeioAmarga.jpeg', 'descricao'=>'Cobertura sabor chocolate M.A. Não necessita temperagem. Perfeito para fazer cascas de trufas.', 'categoria_id'=> $cat->id]);
        $prod7->save();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
