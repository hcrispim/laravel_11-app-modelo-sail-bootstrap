<?php

namespace Database\Seeders;

use App\Models\MaquinaTreino;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaquinaTreinoSeeder extends Seeder
{
    public function run()
    {
        DB::table('maquina_treino')->insert([
            ['nome_maquina_treino' => 'Leg Press', 'foto_maquina_treino' => null],
            ['nome_maquina_treino' => 'Chest Press', 'foto_maquina_treino' => null],
            ['nome_maquina_treino' => 'Lat Pulldown', 'foto_maquina_treino' => null],
            ['nome_maquina_treino' => 'Shoulder Press', 'foto_maquina_treino' => null],
            ['nome_maquina_treino' => 'Bicep Curl', 'foto_maquina_treino' => null],
        ]);
    }
}
