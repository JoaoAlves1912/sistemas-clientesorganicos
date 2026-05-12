<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            // Cria a coluna 'produtor_id' e faz a ligação com a tabela de produtores
            // Usei 'produtors' porque é o nome que está no seu arquivo de migração anterior
            $table->foreignId('produtor_id')
                  ->nullable() 
                  ->constrained('produtors')
                  ->onDelete('set null'); // Se o produtor for deletado, o produto continua lá (sem dono)
        });
    }

    public function down(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            // Se a gente precisar desfazer a migração, ele remove a ligação e a coluna
            $table->dropForeign(['produtor_id']);
            $table->dropColumn('produtor_id');
        });
    }
};
