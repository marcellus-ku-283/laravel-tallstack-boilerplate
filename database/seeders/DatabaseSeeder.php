<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'role' => 'admin',
            'email' => 'admin@example.com',
            'status' => 'active',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now(),
            'email_verified_at' => Carbon::now(),
        ]);

        \App\Models\User::factory(125)->create();
    }
}
