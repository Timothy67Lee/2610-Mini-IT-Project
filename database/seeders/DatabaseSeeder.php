<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Club;
use App\Models\Event;
use App\Models\Membership;
use App\Enums\ClubRole;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create one "Super Admin" for you to log in with
        User::factory()->admin()->create([
            'name' => 'System Manager',
            'email' => 'admin@example.com',
        ]);

        // 2. Create a pool of 15 regular Users
        $users = User::factory(15)->create();

        // 3. Create 5 Clubs
        // Each club will be owned by one of the users we just created
        Club::factory(5)->create()->each(function ($club) use ($users) {
            
            // A. Create 2-4 Events for every club
            Event::factory(rand(2, 4))->create([
                'club_id' => $club->id,
            ]);

            // B. Add the owner to the membership table as 'President'
            Membership::create([
                'user_id' => $club->owner_id,
                'club_id' => $club->id,
                'role' => ClubRole::PRESIDENT->value,
                'status' => 'approved',
            ]);

            // C. Pick 4 random users to be 'Members' of this club
            $potentialMembers = $users->where('id', '!=', $club->owner_id)->random(4);

            foreach ($potentialMembers as $member) {
                Membership::create([
                    'user_id' => $member->id,
                    'club_id' => $club->id,
                    'role' => ClubRole::MEMBER->value,
                    'status' => 'approved',
                ]);
            }
        });
    }
}