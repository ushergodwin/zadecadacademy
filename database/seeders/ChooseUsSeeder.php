<?php

namespace Database\Seeders;

use App\Models\ChooseUs;
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
                'image' => 'chooseus1.jpg',
                'title' => 'Project-based programs',
                'description' => 'Unleash your software potential with a practical approach to software training with relevant project case studies.',
            ],
            [
                'image' => 'chooseus2.jpg',
                'title' => 'One-on-one training',
                'description' => 'Accelerate your learning and growth with personalized one-on-one training.',
            ],
            [
                'image' => 'chooseus3.jpg',
                'title' => 'Physical and Online Study Modes',
                'description' => 'You can choose the optimal study mode that suits your unique learning style',
            ],
            [
                'image' => 'chooseus4.jpg',
                'title' => 'Expert instructors',
                'description' => 'Our instructors have deep experience and expertise in their respective fields',
            ],
            [
                'image' => 'chooseus4.jpg',
                'title' => 'After Course Support',
                'description' => 'Students get up to 30 days of online support from their instructor to help with any post-course issues.',
            ],
        ]);
    }
}
