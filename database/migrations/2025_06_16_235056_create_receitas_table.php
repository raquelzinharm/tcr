<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('receitas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descricao');
            $table->string('tempo_preparo');
            $table->string('dificuldade');
            $table->integer('porcoes');
            $table->string('imagem')->nullable();
            $table->json('ingredientes');
            $table->json('instrucoes');
            $table->text('dica')->nullable();
            $table->json('nutricao')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // relação com usuários
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receitas');
    }
};
