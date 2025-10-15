<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::firstOrCreate(
            ['email' => 'garixpert@gmail.com'], // Check for user with this email
            [                                // If not found, create with this data
                'name' => 'GariXpert',
                'password' => bcrypt('password'),
            ]
        );
        $this->call(CarDataSeeder::class);
        $this->call(ServiceSeeder::class);
    }
}
