<?php

namespace Database\Factories;

use App\Models\Municipio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Consejero>
 */
class ConsejeroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $municipio = Municipio::inRandomOrder()->first()->id;

        return [
            'nombre' => fake()->name(),
            'apellido_1' => fake()->lastName(),
            'apellido_2' => fake()->lastName(),
            'municipio_id' => $municipio,
        ];
    }
}
