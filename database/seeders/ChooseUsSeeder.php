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
                'title' => 'Title 1',
                'description' => 'Description 1.',
            ],
            [
                'image' => 'chooseus2.jpg',
                'title' => 'Title 2',
                'description' => 'Description 2.',
            ],
            [
                'image' => 'chooseus3.jpg',
                'title' => 'Title 3',
                'description' => 'Description 3.',
            ],
            [
                'image' => 'chooseus4.jpg',
                'title' => 'Title 4',
                'description' => 'Description 4.',
            ],
        ]);
    }
}
