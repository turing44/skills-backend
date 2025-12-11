<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Municipio>
 */
class MunicipioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $alcalde = Municipio::inRandomOrder()->first()->id;
        $admin = User::where('rol', 'admin')->inRandomOrder()->first()->id;

        return [
            'nombre' => fake()->city(),
            'alcalde_id' => $alcalde,
            'admin_id' => $admin,

            'poblacion_verano' => fake()->randomNumber(),
            'poblacion_fiestas' => fake()->randomNumber(),
            'poblacion_censada' => fake()->randomNumber(),
        ];
    }
}
