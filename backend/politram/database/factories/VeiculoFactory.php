<?php

namespace Database\Factories;

use App\Models\Veiculo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\Fakecar;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Veiculo>
 */
class VeiculoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Veiculo::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $this->faker->addProvider(new Fakecar($this->faker));
        return [
            'modelo' => $this->faker->vehicleModel,
            'marca' => $this->faker->vehicleBrand,
            'placa' => $this->faker->vehicleRegistration,
            'cor' => fake()->colorName(),
            'quilometragem' => fake()->numberBetween($min = 1000, $max = 9999999),
            'tipos_veiculo_id' => fake()->numberBetween($int1 = 1, $int2 = 10),
            'ano' => fake()->year($max = 'now')
        ];
    }
}
