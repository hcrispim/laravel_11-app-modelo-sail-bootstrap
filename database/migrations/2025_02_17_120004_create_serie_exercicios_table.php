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
        Schema::create('serie_exercicio', function (Blueprint $table) {
            $table->id('id_serie_exercicio');
            $table->unsignedBigInteger('id_sessao_treinamento');
            $table->unsignedBigInteger('id_grupo_muscular');
            $table->unsignedBigInteger('id_maquina_treino');
            $table->integer('numero_series')->nullable();
            $table->integer('repeticoes_series')->nullable();
            $table->float('carga')->nullable();
            $table->timestamps();

            $table->foreign('id_sessao_treinamento')
                ->references('id_sessao_treinamento')
                ->on('sessao_treinamento')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->foreign('id_grupo_muscular')
                ->references('id_grupo_muscular')
                ->on('grupo_muscular')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->foreign('id_maquina_treino')
                ->references('id_maquina_treino')
                ->on('maquina_treino')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('serie_exercicios');
    }
};
