<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'member', 'label' => 'Member', 'sort_order' => 1],
            ['name' => 'admin', 'label' => 'Admin', 'sort_order' => 2],
            ['name' => 'owner', 'label' => 'Owner', 'sort_order' => 3],
        ];
        
        foreach ($roles as $role) {
            UserRole::updateOrCreate(
                ['name' => $role['name']],
                $role
            );
        }
    }
}
