<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seeder user dummy
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Jalankan seeder lain
        $this->call([
            JobSeeder::class,
            MBTISeeder::class,
            QuestionSeeder::class,
            RuleSeeder::class,
        ]);
    }
}

