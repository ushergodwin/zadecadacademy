<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Team::insert([
            [
                'image' => 'team1.jpg',
                'name' => 'John Doe',
                'position' => 'Manager',
            ],
            [
                'image' => 'team2.jpg',
                'name' => 'Jane Doe',
                'position' => 'Assistant Manager',
            ],
            [
                'image' => 'team3.jpg',
                'name' => 'Mike Smith',
                'position' => 'Developer',
            ],
            [
                'image' => 'team4.jpg',
                'name' => 'Sara Johnson',
                'position' => 'Designer',
            ],
        ]);
    }
}
