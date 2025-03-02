<?php

namespace Database\Seeders;

use App\Models\SessaoTreinamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SessaoTreinamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sessao_treinamento')->insert([
            [
                'id_programa_treinamento' => 1,
                'dt_sessao_planejada' => now()->addDays(1),
                'tempo_duracao_planejada' => '01:00:00',
                'dt_sessao_executada' => null,
                'tempo_duracao_executada' => null,
            ],
            [
                'id_programa_treinamento' => 1,
                'dt_sessao_planejada' => now()->addDays(2),
                'tempo_duracao_planejada' => '01:00:00',
                'dt_sessao_executada' => null,
                'tempo_duracao_executada' => null,
            ],
            [
                'id_programa_treinamento' => 1,
                'dt_sessao_planejada' => now()->addDays(3),
                'tempo_duracao_planejada' => '01:00:00',
                'dt_sessao_executada' => null,
                'tempo_duracao_executada' => null,
            ],
            [
                'id_programa_treinamento' => 2,
                'dt_sessao_planejada' => now()->addDays(2),
                'tempo_duracao_planejada' => '01:30:00',
                'dt_sessao_executada' => null,
                'tempo_duracao_executada' => null,
            ],
            [
                'id_programa_treinamento' => 2,
                'dt_sessao_planejada' => now()->addDays(1),
                'tempo_duracao_planejada' => '01:30:00',
                'dt_sessao_executada' => null,
                'tempo_duracao_executada' => null,
            ],
            // Adicione mais sessões conforme necessário...
        ]);
    }
}
