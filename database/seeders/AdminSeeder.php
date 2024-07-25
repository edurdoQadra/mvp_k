<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if the user already exists
        if (User::where('email', 'admin@example.com')->doesntExist()) {
            User::create([
                'name' => 'admin',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // You can use Hash::make to hash the password
                'remember_token' => Str::random(10),
            ])->assignRole('admin');

            $this->command->info('Admin user created.');
        } else {
            $this->command->info('Admin user already exists.');
        }
    }
}
