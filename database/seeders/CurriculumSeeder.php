<?php

namespace Database\Seeders;

use App\Models\Curriculum;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurriculumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Curriculum::insert([
            ['course_id' => 1, 'created_at' => Carbon::now()],
            ['course_id' => 2, 'created_at' => Carbon::now()],
            ['course_id' => 3, 'created_at' => Carbon::now()],
            ['course_id' => 4, 'created_at' => Carbon::now()],
        ]);
    }
}
