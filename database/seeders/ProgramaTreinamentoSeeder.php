<?php

namespace Database\Seeders;

use App\Models\ProgramaTreinamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramaTreinamentoSeeder extends Seeder
{
    public function run()
    {
        DB::table('programa_treinamento')->insert([
            ['id_usuario' => 1, 'nome_programa' => 'Hipertrofia', 'dt_inicio' => today(), 'dt_final' => today()->addMonths(3)],
            ['id_usuario' => 2, 'nome_programa' => 'Emagrecimento', 'dt_inicio' => today(), 'dt_final' => today()->addMonths(3)],
            ['id_usuario' => 1, 'nome_programa' => 'Força', 'dt_inicio' => today(), 'dt_final' => today()->addMonths(3)],
            ['id_usuario' => 2, 'nome_programa' => 'Resistência', 'dt_inicio' => today(), 'dt_final' => today()->addMonths(3)],
            ['id_usuario' => 1, 'nome_programa' => 'Treino Funcional', 'dt_inicio' => today(), 'dt_final' => today()->addMonths(3)],
        ]);
    }
}
