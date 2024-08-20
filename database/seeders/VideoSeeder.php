<?php

namespace Database\Seeders;

use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Video::insert([
            [
                'course_id' => 1,
                'title' => 'Video 1',
                'link' => 'https://player.vimeo.com/video/682719578?h=4ac5b2fc9a',
                'created_at' => Carbon::now()
            ],
            [
                'course_id' => 1,
                'title' => 'Video 2',
                'link' => 'https://player.vimeo.com/video/682719578?h=4ac5b2fc9a',
                'created_at' => Carbon::now()
            ],
            [
                'course_id' => 3,
                'title' => 'Video 3',
                'link' => 'https://player.vimeo.com/video/682719578?h=4ac5b2fc9a',
                'created_at' => Carbon::now()
            ],
            [
                'course_id' => 4,
                'title' => 'Video 4',
                'link' => 'https://www.youtube.com/watch?v=fRNhkQpp0wU',
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
