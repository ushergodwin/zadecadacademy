<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Program::insert([
            [
                'pg_name' => 'Program 1',
                'pg_image' => 'program1.jpg',
                'description' => 'Description for Program 1.',
                'software' => 'Software 1',
            ],
            [
                'pg_name' => 'Program 2',
                'pg_image' => 'program2.jpg',
                'description' => 'Description for Program 2.',
                'software' => 'Software 2',
            ],
            [
                'pg_name' => 'Program 3',
                'pg_image' => 'program3.jpg',
                'description' => 'Description for Program 3.',
                'software' => 'Software 3',
            ],
            [
                'pg_name' => 'Program 4',
                'pg_image' => 'program4.jpg',
                'description' => 'Description for Program 4.',
                'software' => 'Software 4',
            ],
        ]);
    }
}
