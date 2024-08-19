<?php

namespace Database\Seeders;

use App\Models\Course;
use Carbon\Carbon;
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
                'cs_name' => 'AutoCAD Electrical Fundamentals',
                'attachment' => '361712066.pdf',
                'created_at' => Carbon::now()
            ],
            [
                'code' => 102,
                'cs_name' => 'AutoCAD Mechanical Fundamentals',
                'attachment' => '597652741.pdf',
                'created_at' => Carbon::now()
            ],
            [
                'code' => 103,
                'cs_name' => 'Autodesk AutoCAD Fundamentals',
                'attachment' => '549144993.pdf',
                'created_at' => Carbon::now()
            ],
            [
                'code' => 104,
                'cs_name' => 'Course outline- ArchiCad',
                'attachment' => '139885006.pdf',
                'created_at' => Carbon::now()
            ],
            [
                'code' => 104,
                'cs_name' => 'Course outline- Protastructure',
                'attachment' => '628656168.pdf',
                'created_at' => Carbon::now()
            ],
            [
                'code' => 104,
                'cs_name' => 'Epanet Software_Course Description',
                'attachment' => '414769870.pdf',
                'created_at' => Carbon::now()
            ],
            [
                'code' => 104,
                'cs_name' => 'Planswift course - ZadeCAD Academy',
                'attachment' => '146818304.pdf',
                'created_at' => Carbon::now()
            ],
            [
                'code' => 104,
                'cs_name' => 'Revit Architecture Essential Training',
                'attachment' => '456274322.pdf',
                'created_at' => Carbon::now()
            ],
            [
                'code' => 104,
                'cs_name' => 'ZadeCAD Academy Civil 3D',
                'attachment' => '478759995.pdf',
                'created_at' => Carbon::now()
            ],
            [
                'code' => 104,
                'cs_name' => 'ZadeCAD STAAD.Pro syllabus',
                'attachment' => '377561156.pdf',
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
