<?php

namespace Database\Seeders;

use App\Models\User;
use App\Enums\UserStatus;
use App\Enums\UserVerification;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create a VERIFIED Admin
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Verified Admin',
                'password' => Hash::make('password'),
                'is_admin' => true,
                'email_verified_at' => now(), // This is what Laravel checks
                'status' => UserStatus::ACTIVE->value,
                'verification' => UserVerification::VERIFIED->value,
            ]
        );

        // 2. Create an UNVERIFIED User (to show the feature works)
        User::updateOrCreate(
            ['email' => 'student@example.com'],
            [
                'name' => 'New Student',
                'password' => Hash::make('password'),
                'is_admin' => false,
                'email_verified_at' => null, // Empty means they aren't verified yet
                'status' => UserStatus::ACTIVE->value,
                'verification' => UserVerification::UNVERIFIED->value,
            ]
        );
        
        // Club::factory(5)->create(); 
    }
}