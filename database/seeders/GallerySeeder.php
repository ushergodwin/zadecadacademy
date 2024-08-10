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
                'image' => 'gallery1.jpg',
                'caption' => 'Caption 1',
                'status' => 'active',
            ],
            [
                'image' => 'gallery2.jpg',
                'caption' => 'Caption 2',
                'status' => 'active',
            ],
            [
                'image' => 'gallery3.jpg',
                'caption' => 'Caption 3',
                'status' => 'inactive',
            ],
            [
                'image' => 'gallery4.jpg',
                'caption' => 'Caption 4',
                'status' => 'active',
            ],
        ]);
    }
}
