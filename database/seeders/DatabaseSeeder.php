<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'no_hp' => '081234567890',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'username' => 'nurrasya',
            'email' => 'nurrasya@gmail.com',
            'no_hp' => '089876543210',
            'password' => Hash::make('nurrasya123'),
        ]);
    }
}
