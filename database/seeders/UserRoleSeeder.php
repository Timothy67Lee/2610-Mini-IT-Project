<?php
namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder {
    public function run(): void {
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