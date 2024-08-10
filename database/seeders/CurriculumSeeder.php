<?php

namespace Database\Seeders;

use App\Models\Curriculum;
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
            ['course_id' => 1],
            ['course_id' => 2],
            ['course_id' => 3],
            ['course_id' => 4],
        ]);
    }
}
