<?php

namespace Database\Factories;

use App\Models\Municipio;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('1234'),

            'rol' => fake()->randomElement(['admin', 'alcalde']),
        ];
    }



    public function ciudadanos(): static
    {

        return $this->state(fn (array $attributes) => [
            'rol' => 'ciudadano',
            'municipio_id' => Municipio::inRandomOrder()->first()->id,
        ]);
    }

    public function admins(): static
    {
        return $this->state(fn (array $attributes) => [
            'rol' => 'admin',
        ]);
    }

    public function alcaldes(): static
    {
        return $this->state(fn (array $attributes) => [
            'rol' => 'alcalde',
        ]);
    }
}
