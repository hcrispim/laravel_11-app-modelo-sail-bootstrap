<?php

namespace Database\Factories;

use App\Models\SessaoTreinamento;
use Illuminate\Database\Eloquent\Factories\Factory;

class SessaoTreinamentoFactory extends Factory
{
    protected $model = SessaoTreinamento::class;

    public function definition()
    {
        return [
            'id_programa_treinamento' => $this->faker->numberBetween(1, 10),
            'dt_sessao' => $this->faker->dateTime(),
            'tempo_duracao' => $this->faker->time(),
        ];
    }
}
