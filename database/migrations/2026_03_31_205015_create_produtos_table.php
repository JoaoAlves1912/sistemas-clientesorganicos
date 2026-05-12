<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');          // Nome do orgânico (Ex: Alface Americana)
            $table->text('descricao');      // Detalhes (Ex: Colhido hoje de manhã, sem agrotóxicos)
            $table->decimal('preco', 8, 2); // Preço: até 999.999,99 com 2 casas decimais
            $table->integer('estoque');    // Quantidade em unidades ou maços
            $table->timestamps();
        });
    }
};
