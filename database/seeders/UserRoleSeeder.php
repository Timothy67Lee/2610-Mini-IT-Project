<?php
namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Seeder;
use App\Enums\UserRole;

class UserRoleSeeder extends Seeder{

    public function run(): void
    {
        User::create([
            'name'   => 'Admin User',
            'email'  => 'admin@example.com',
            'role'   => UserRole::ADMIN,
        ]);
    }
}