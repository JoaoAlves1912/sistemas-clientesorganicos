<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produtors', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('fazenda');
            $table->string('cidade')->nullable();

            // NOSSAS DUAS COLUNAS NOVAS AQUI:
            $table->string('cpf')->nullable();
            $table->string('endereco')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtors');
    }
};
