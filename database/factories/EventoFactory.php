<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Municipio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evento>
 */
class EventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
            'creador_id' => 1, // digamos que todos los eventos los crea el admin
            'municipio_id' => Municipio::inRandomOrder()->first()->id,
            'precio' => fake()->randomFloat(2, 1, 90),
            'fecha' => fake()->date(),
        ];
    }
}
