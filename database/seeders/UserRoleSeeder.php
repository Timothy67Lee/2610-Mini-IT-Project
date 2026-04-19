<?php

namespace Database\Seeders;

use App\Models\User;                     
use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Enums\UserVerification;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'         => 'Admin User',
            'email'        => 'admin@example.com',
            'password'     => bcrypt('password'),
            'role'         => UserRole::ADMIN,
            'status'       => UserStatus::ACTIVE,
            'verification' => UserVerification::VERIFIED,
        ]);
    }
}