<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClubSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('clubs')->insert([
            ['name' => 'Drama', 'description' => 'Drama club events'],
            ['name' => 'Chess', 'description' => 'Chess tournaments'],
            ['name' => 'Music', 'description' => 'Music performances'],
            ['name' => 'Football', 'description' => 'Football matches'],
            ['name' => 'Badminton', 'description' => 'Badminton games'],
            ['name' => 'Basketball', 'description' => 'Basketball training'],
        ]);
    }
}
