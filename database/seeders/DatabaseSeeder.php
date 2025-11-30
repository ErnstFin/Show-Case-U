<?php

namespace Database\Seeders;

use App\Models\User;
<<<<<<< HEAD
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
=======
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

>>>>>>> origin/Jojo
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
<<<<<<< HEAD

        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => Hash::make('Admin!234'),
        ]);
=======
>>>>>>> origin/Jojo
    }
}
