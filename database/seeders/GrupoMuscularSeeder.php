<?php

namespace Database\Seeders;

use App\Models\GrupoMuscular;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrupoMuscularSeeder extends Seeder
{

    public function run()
    {
        DB::table('grupo_muscular')->insert([
            ['nome_grupo_muscular' => 'Peitoral', 'localizacao_grupo_muscular' => 'Superior'],
            ['nome_grupo_muscular' => 'Costas', 'localizacao_grupo_muscular' => 'Superior'],
            ['nome_grupo_muscular' => 'Pernas', 'localizacao_grupo_muscular' => 'Inferior'],
            ['nome_grupo_muscular' => 'Ombros', 'localizacao_grupo_muscular' => 'Superior'],
            ['nome_grupo_muscular' => 'Bíceps', 'localizacao_grupo_muscular' => 'Superior'],
        ]);
    }
}
