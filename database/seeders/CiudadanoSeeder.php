<?php

namespace Database\Seeders;

use Database\Factories\CiudadanoFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CiudadanoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CiudadanoFactory::new()->count(20)->create();
    }
}
