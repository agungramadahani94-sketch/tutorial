<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       User::create([
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'password',
            'role' => 'admin',
            'theme' => 'hospital',

        ]);

        User::create([
            'nama' => 'Hospital User',
            'email' => 'hospital@gmail.com',
            'password' => 'password',
            'role' => 'hospital',
            'theme' => 'hospital',
        ]);
    }
}
