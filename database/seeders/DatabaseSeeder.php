<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            SiteUserSeeder::class,
            ProgramSeeder::class,
            CourseSeeder::class,
            GallerySeeder::class,
            ChooseUsSeeder::class,
            ImageSeeder::class,
            TeamSeeder::class,
            ContactSeeder::class,
            EnrollmentSeeder::class,
            TransactionSeeder::class,
            CurriculumSeeder::class,
            VideoSeeder::class,
        ]);
    }
}
