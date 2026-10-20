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

        User::factory()->create([
            'name' => 'Admin 1',
            'email' => 'admin@nurulfalah.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Admin 2',
            'email' => 'admin2@nurulfalah.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Bendahara 1',
            'email' => 'bendahara@nurulfalah.com',
            'password' => bcrypt('password'),
            'role' => 'bendahara',
        ]);

        User::factory()->create([
            'name' => 'Bendahara 2',
            'email' => 'bendahara2@nurulfalah.com',
            'password' => bcrypt('password'),
            'role' => 'bendahara',
        ]);

        User::factory()->create([
            'name' => 'Santri Mock',
            'email' => 'santri@nurulfalah.com',
            'password' => bcrypt('password'),
            'role' => 'santri',
        ]);
    }
}
