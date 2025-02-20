<?php

namespace Database\Seeders;

use App\Models\SerieExercicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SerieExercicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('serie_exercicio')->insert([
            [
                'id_sessao_treinamento' => 1,
                'id_grupo_muscular' => 1,
                'id_maquina_treino' => 1,
                'numero_series' => 4,
                'repeticoes_series' => 12,
                'carga' => 100.0,
            ],
            [
                'id_sessao_treinamento' => 1,
                'id_grupo_muscular' => 2,
                'id_maquina_treino' => 2,
                'numero_series' => 3,
                'repeticoes_series' => 10,
                'carga' => 80.0,
            ],
            [
                'id_sessao_treinamento' => 2,
                'id_grupo_muscular' => 3,
                'id_maquina_treino' => 3,
                'numero_series' => 4,
                'repeticoes_series' => 15,
                'carga' => 60.0,
            ],
            // Adicione mais séries conforme necessário...
        ]);
    }
}
