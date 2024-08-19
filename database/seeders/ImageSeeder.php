<?php

namespace Database\Seeders;

use App\Models\Image;
use Carbon\Carbon;
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
                'image' => '978963773.jpg',
                'caption' => 'Caption 1',
                'status' => 'active',
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
