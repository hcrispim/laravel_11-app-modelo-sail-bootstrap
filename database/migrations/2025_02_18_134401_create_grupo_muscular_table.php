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
        Schema::create('grupo_muscular', function (Blueprint $table) {
            $table->id('id_grupo_muscular');
            $table->string('nome_grupo_muscular', 45)->nullable();
            $table->string('localizacao_grupo_muscular', 45)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupo_muscular');
    }
};
