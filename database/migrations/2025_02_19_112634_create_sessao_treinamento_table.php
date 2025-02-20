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
        Schema::create('sessao_treinamento', function (Blueprint $table) {
            $table->id('id_sessao_treinamento');
            $table->unsignedBigInteger('id_programa_treinamento');
            $table->dateTime('dt_sessao_planejada')->nullable();
            $table->time('tempo_duracao_planejada')->nullable();
            $table->dateTime('dt_sessao_executada')->nullable();
            $table->time('tempo_duracao_executada')->nullable();
            $table->timestamps();

            $table->foreign('id_programa_treinamento')
                ->references('id_programa_treinamento')
                ->on('programa_treinamento')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessao_treinamento');
    }
};
