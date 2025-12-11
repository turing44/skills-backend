<?php

namespace Database\Seeders;

use Database\Factories\CiudadanoFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CiudadanoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->ciudadanos()->count(10)->create();
    }
}
