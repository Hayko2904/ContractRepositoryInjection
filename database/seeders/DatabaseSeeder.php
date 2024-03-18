<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);

        Category::factory()
            ->count(5)
            ->create();

        $this->call([
            DataSeeder::class
        ]);
    }
}
