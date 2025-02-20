<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('maquina_treino', function (Blueprint $table) {
            $table->id('id_maquina_treino');
            $table->string('nome_maquina_treino', 45)->nullable();
            $table->binary('foto_maquina_treino')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maquina_treino');
    }
};
