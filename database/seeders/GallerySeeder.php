<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Gallery::insert([
            [
                'image' => '548421325.jpg',
                'caption' => 'Caption 1',
                'status' => 'yes',
            ],
            [
                'image' => '113218730.jpg',
                'caption' => 'Caption 2',
                'status' => 'yes',
            ],
            [
                'image' => '123100483.jpg',
                'caption' => 'Caption 3',
                'status' => 'yes',
            ],
            [
                'image' => '950136444.jpg',
                'caption' => 'Caption 4',
                'status' => 'yes',
            ],
            [
                'image' => '321570974.jpg',
                'caption' => 'Caption 4',
                'status' => 'yes',
            ],
            [
                'image' => '564804036.jpg',
                'caption' => 'Caption 4',
                'status' => 'yes',
            ],
            [
                'image' => '529401057.jpg',
                'caption' => 'Caption 4',
                'status' => 'yes',
            ],
        ]);
    }
}
