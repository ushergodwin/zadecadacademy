<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Image::insert([
            [
                'image' => 'image1.jpg',
                'caption' => 'Caption 1',
                'status' => 'active',
            ],
            [
                'image' => 'image2.jpg',
                'caption' => 'Caption 2',
                'status' => 'active',
            ],
            [
                'image' => 'image3.jpg',
                'caption' => 'Caption 3',
                'status' => 'inactive',
            ],
            [
                'image' => 'image4.jpg',
                'caption' => 'Caption 4',
                'status' => 'active',
            ],
        ]);
    }
}
