<?php

namespace Database\Seeders;

use App\Models\Team;
use Carbon\Carbon;
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
                'created_at' => Carbon::now()
            ],
            [
                'image' => 'team2.jpg',
                'name' => 'Jane Doe',
                'position' => 'Assistant Manager',
                'created_at' => Carbon::now()
            ],
            [
                'image' => 'team3.jpg',
                'name' => 'Mike Smith',
                'position' => 'Developer',
                'created_at' => Carbon::now()
            ],
            [
                'image' => 'team4.jpg',
                'name' => 'Sara Johnson',
                'position' => 'Designer',
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
