<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Course::insert([
            [
                'code' => 101,
                'cs_name' => 'Course 1',
                'attachment' => 'attachment1.pdf',
            ],
            [
                'code' => 102,
                'cs_name' => 'Course 2',
                'attachment' => 'attachment2.pdf',
            ],
            [
                'code' => 103,
                'cs_name' => 'Course 3',
                'attachment' => 'attachment3.pdf',
            ],
            [
                'code' => 104,
                'cs_name' => 'Course 4',
                'attachment' => 'attachment4.pdf',
            ],
        ]);
    }
}
