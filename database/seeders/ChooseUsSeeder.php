<?php

namespace Database\Seeders;

use App\Models\ChooseUs;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChooseUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        ChooseUs::insert([
            [
                'image' => 'project-based-learning.png',
                'title' => 'Project-based programs',
                'description' => 'Unleash your software potential with a practical approach to software training with relevant project case studies.',
                'created_at' => Carbon::now()
            ],
            [
                'image' => 'one-to-one-training.png',
                'title' => 'One-on-one training',
                'description' => 'Accelerate your learning and growth with personalized one-on-one training.',
                'created_at' => Carbon::now()
            ],
            [
                'image' => 'Online-Classes-VS-Offline-Classes.png',
                'title' => 'Physical and Online Study Modes',
                'description' => 'You can choose the optimal study mode that suits your unique learning style',
                'created_at' => Carbon::now()
            ],
            [
                'image' => 'expert-instructors.png',
                'title' => 'Expert instructors',
                'description' => 'Our instructors have deep experience and expertise in their respective fields',
                'created_at' => Carbon::now()
            ],
            [
                'image' => 'course-support.jpg',
                'title' => 'After Course Support',
                'description' => 'Students get up to 30 days of online support from their instructor to help with any post-course issues.',
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
