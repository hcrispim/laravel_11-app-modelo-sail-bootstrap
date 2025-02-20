<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MaquinaTreino;

class MaquinaTreinoFactory extends Factory
{

    public function definition(): array
    {
        return [
            'nome_maquina_treino' =>  fake()->name(),
            'foto_maquina_treino' =>  fake()->imageUrl('60', '60'),
        ];
    }
}
