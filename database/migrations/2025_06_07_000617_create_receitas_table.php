<?php
/*
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.

    public function up(): void
    {
        Schema::create('receitas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('titulo');
            $table->text('descricao')->nullable();
            $table->string('imagem')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }


      Reverse the migrations.

    public function down(): void
    {
        Schema::dropIfExists('receitas');
    }
};
*/
