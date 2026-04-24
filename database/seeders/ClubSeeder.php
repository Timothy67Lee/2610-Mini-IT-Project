<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Club;

class ClubSeeder extends Seeder
{
    public function run(): void
    {
        $clubs = [
            [
                'name' => 'Drama Club',
                'description' => 'Explore your creativity through acting and stage performance.',
                'profile_picture' => 'picture2.jpg',
            ],
            [
                'name' => 'Chess Club',
                'description' => 'Sharpen your mind with weekly chess matches and tournaments.',
                'profile_picture' => 'picture1.jpg',
            ],
            [
                'name' => 'Music Club',
                'description' => 'Bring out the musical talent in you in our club.',
                'profile_picture' => 'picture3.jpg',
            ],
            [
                'name' => 'Football Club',
                'description' => 'You got Ball knowledge? Join the Football Club.',
                'profile_picture' => 'picture4.jpg',
            ],
            [
                'name' => 'Badminton Club',
                'description' => 'Lee Chong Wei academy.',
                'profile_picture' => 'picture5.jpg',
            ],
            [
                'name' => 'Basketball Club',
                'description' => 'Practice drills and play competitive games with us.',
                'profile_picture' => 'picture6.jpg',
            ],
        ];

        foreach ($clubs as $club) {
            Club::create($club);
        }
    }
}
