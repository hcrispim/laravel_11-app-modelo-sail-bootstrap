<?php

namespace Database\Seeders;

use App\Models\MaquinaTreino;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,
            ProgramaTreinamentoSeeder::class,
            GrupoMuscularSeeder::class,
            MaquinaTreinoSeeder::class,
            SessaoTreinamentoSeeder::class,
            SerieExercicioSeeder::class,
        ]);
        // execucao de factories necessarias
        //User::factory(5)->create();


    }
}
