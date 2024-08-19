<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Carbon\Carbon;
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
                'created_at' => Carbon::now()
            ],
            [
                'image' => '113218730.jpg',
                'caption' => 'Caption 2',
                'status' => 'yes',
                'created_at' => Carbon::now()
            ],
            [
                'image' => '123100483.jpg',
                'caption' => 'Caption 3',
                'status' => 'yes',
                'created_at' => Carbon::now()
            ],
            [
                'image' => '950136444.jpg',
                'caption' => 'Caption 4',
                'status' => 'yes',
                'created_at' => Carbon::now()
            ],
            [
                'image' => '321570974.jpg',
                'caption' => 'Caption 4',
                'status' => 'yes',
                'created_at' => Carbon::now()
            ],
            [
                'image' => '564804036.jpg',
                'caption' => 'Caption 4',
                'status' => 'yes',
                'created_at' => Carbon::now()
            ],
            [
                'image' => '529401057.jpg',
                'caption' => 'Caption 4',
                'status' => 'yes',
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
