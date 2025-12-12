<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Municipio;
use App\Models\Consejero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;



class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('1234'),
            'rol' => 'admin'
        ]);




        User::factory()->alcaldes()->count(10)->create();





        $alcaldes = User::where('rol', 'alcalde')->pluck('id');

        foreach ($alcaldes as $alcalde) {

            $admin = User::where('rol', 'admin')->inRandomOrder()->first()->id;

            Municipio::create([
                'nombre' => fake()->city(),
                'alcalde_id' => $alcalde,
                'admin_id' => $admin,

                'poblacion_verano' => fake()->numberBetween(5000, 999_999_999),
                'poblacion_fiestas' => fake()->numberBetween(5000, 999_999_999),
                'poblacion_censada' => fake()->numberBetween(5000, 999_999_999),
            ]);
        }


        Consejero::factory(12)->create();


        User::factory()->ciudadanos()->count(33)->create();

        

    }
}
