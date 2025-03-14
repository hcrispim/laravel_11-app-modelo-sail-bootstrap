<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProgramaTreinamento>
 */
class ProgramaTreinamentoFactory extends Factory
{
    protected $model = ProgramaTreinamento::class;

    public function definition()
    {
        return [
            'id_usuario' => $this->faker->numberBetween(1, 10),
            'nome_programa' => $this->faker->word,
            'dt_inicio' => $this->faker->date(),
            'dt_final' => $this->faker->date(),
        ];
    }
}
