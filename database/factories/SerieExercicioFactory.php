<?php

namespace Database\Factories;

use App\Models\SerieExercicio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SerieExercicio>
 */
class SerieExercicioFactory extends Factory
{
    protected $model = SerieExercicio::class;

    public function definition()
    {
        return [
            'id_sessao_treinamento' => $this->faker->numberBetween(1, 50),
            'id_grupo_muscular' => $this->faker->numberBetween(1, 50),
            'id_maquina_treino' => $this->faker->numberBetween(1, 50),
            'numero_series' => $this->faker->numberBetween(1, 5),
            'repeticoes_series' => $this->faker->numberBetween(8, 15),
            'carga' => $this->faker->randomFloat(2, 10, 100),
        ];
    }
}
