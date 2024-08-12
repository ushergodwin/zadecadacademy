<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Program::insert([
            [
                'pg_image' => '633387715.jpg',
                'pg_name' => 'RC and Steel Structural Analysis and Design',
                'description' => 'In this course you will learn about the analysis and design of Reinforced Concrete (RC) and Steel buildings, and discover how structural engineering is both a scientific discipline and logical form. Which is also a sub-discipline of civil engineering in which structural engineers are trained to design the &lsquo;bones and muscles&rsquo; that create the form and shape of manmade structures.',
                'software' => 'Software 1',
            ],
            [
                'pg_image' => '359426204.jpg',
                'pg_name' => 'Water pipe network distribution design',
                'description' => '<p>One of the most important aspects in the design of water supply and irrigation systems is the design of an optimal system. From choosing the right layout of the system after mapping to setting/assigning demands to the target nodes. The main focus of this course is to help design engineers to understand the most important steps taken in design and simulation of water systems by using Epanet and the Associate software (Google Earth/AutoCad).</p>',
                'software' => 'Software 2',
            ],
            [
                'pg_image' => '607459331.jpg',
                'pg_name' => 'Architectural 2D and 3D Building Design',
                'description' => '<p>During the course, students will be acquainted with the technology for creating 2D and 3D drawings. The trainer will describe the means of conceptual design, detail and documentation. You will gain experience that will help and inspire you to advance in your personal and professional development. You will attain skills in a practical way with the help of sample project design and assignments.</p>',
                'software' => 'Software 3',
            ],
            [
                'pg_image' => '598102868.jpg',
                'pg_name' => 'Architectural Designs',
                'description' => 'Description for Program 4.',
                'software' => 'Software 4',
            ],
            [
                'pg_image' => '254507219.jpg',
                'pg_name' => 'BOQ and Material schedules preparation',
                'description' => 'Description for Program 4.',
                'software' => 'Software 4',
            ],
            [
                'pg_image' => '794274892.jpg',
                'pg_name' => 'Highways and Roads Design',
                'description' => 'Description for Program 4.',
                'software' => 'Software 4',
            ],
            [
                'pg_image' => '709548581.jpg',
                'pg_name' => 'Mechanical HVAC Design',
                'description' => 'Description for Program 4.',
                'software' => 'Software 4',
            ],
            [
                'pg_image' => '900263648',
                'pg_name' => 'Plumbing and Drainage system design',
                'description' => 'Description for Program 4.',
                'software' => 'Software 4',
            ],
            [
                'pg_image' => '672445763.jpg',
                'pg_name' => 'Electrical Systems Design',
                'description' => 'Description for Program 4.',
                'software' => 'Software 4',
            ],
            [
                'pg_image' => '953410234.jpg',
                'pg_name' => 'Product Design and Manufacturing',
                'description' => 'Description for Program 4.',
                'software' => 'Software 4',
            ],
            [
                'pg_image' => '503088455.jpg',
                'pg_name' => 'Project & BIM Management',
                'description' => 'Description for Program 4.',
                'software' => 'Software 4',
            ],
            [
                'pg_image' => '365316508.jpg',
                'pg_name' => 'Physical planning and Land surveying',
                'description' => 'Description for Program 4.',
                'software' => 'Software 4',
            ],
            [
                'pg_image' => '326073055.jpg',
                'pg_name' => 'Public Health & Environmentalists',
                'description' => 'Description for Program 4.',
                'software' => 'Software 4',
            ],
            [
                'pg_image' => '943792091.jpg',
                'pg_name' => 'Graphic Design',
                'description' => 'Description for Program 4.',
                'software' => 'Software 4',
            ],
            [
                'pg_image' => '242489319.jpg',
                'pg_name' => 'Photo editing',
                'description' => 'Description for Program 4.',
                'software' => 'Software 4',
            ],
            [
                'pg_image' => '737165044.jpg',
                'pg_name' => 'Video editing',
                'description' => 'Description for Program 4.',
                'software' => 'Software 4',
            ],
        ]);
    }
}
