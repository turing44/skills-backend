<?php

namespace Database\Factories;

use App\Models\User;
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
            'creador_id' => User::inRandomOrder()->where('rol', 'alcalde')->orWhere('rol', 'admin')->id,
            'precio' => fake()->randomFloat(2, 1, 90),
            'fecha' => fake()->date(),
        ];
    }
}
