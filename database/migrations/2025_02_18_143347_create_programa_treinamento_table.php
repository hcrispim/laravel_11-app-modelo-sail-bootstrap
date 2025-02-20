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
        Schema::create('programa_treinamento', function (Blueprint $table) {
            $table->id('id_programa_treinamento');
            $table->unsignedBigInteger('id_usuario');
            $table->string('nome_programa', 45)->nullable();
            $table->dateTime('dt_inicio')->nullable();
            $table->dateTime('dt_final')->nullable();
            $table->timestamps();

            $table->foreign('id_usuario')
                ->references('id')
                ->on('users')  // Certifique-se de que esta seja a tabela correta
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programa_treinamento');
    }
};
