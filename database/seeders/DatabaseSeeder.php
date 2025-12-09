<?php

namespace Database\Seeders;

use App\Models\User;
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

        User::factory()->create([
            'name' => 'alcalde 1',
            'email' => 'alacalde1@alcalde.com',
            'password' => Hash::make('1234'),
            'rol' => 'alcalde'
        ]);


        User::factory(10)->create();
    }
}
