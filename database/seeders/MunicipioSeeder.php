<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Municipio;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $alcaldes = User::where('rol', 'alcalde')->pluck('id');

        foreach ($alcaldes as $alcalde) {
            Municipio::create([
                'nombre' => fake()->city(),
                'alcalde_id' => $alcalde,
                'admin_id' => 1,

                'poblacion_verano' => '1000',
                'poblacion_fiestas' => '1000',
                'poblacion_censada' => '1000',
            ]);
        }

    }
}
