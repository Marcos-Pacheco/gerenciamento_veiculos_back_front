<?php

namespace Database\Factories;

use App\Models\Manutencao;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Manutencao>
 */
class ManutencaoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Manutencao::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'descricao' => fake()->text($maxNbChars = 250),
            'custo' => fake()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 999999),
            'data_proxima_manutencao' => fake()->dateTimeThisMonth($max = '+ 1 month', $timezone = null),
            'data_manutencao' => fake()->dateTimeThisMonth($max = 'now', $timezone = null),
            'observacao' => fake()->text($maxNbChars = 255),
            'tipos_servico_id' => fake()->numberBetween($int1 = 1, $int2 = 10),
            'veiculos_id' => fake()->numberBetween($int1 = 1, $int2 = 10),
            'users_id' => fake()->numberBetween($int1 = 1, $int2 = 10)
        ];
    }
}
