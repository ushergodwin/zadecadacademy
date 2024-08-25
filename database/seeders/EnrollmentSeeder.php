<?php

namespace Database\Seeders;

use App\Models\Enrollment;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Enrollment::insert([
            [
                'program_id' => 1,
                'fullname' => 'John Doe',
                'email' => 'doe@gmail.com',
                'phone' => '1234567890',
                'whatsapp' => '1234567890',
                'gender' => 'Male',
                'country' => 'Country 1',
                'enrollment_date' => now(),
                'occupation' => 'Occupation 1',
                'field_of_study' => 'Field of Study 1',
                'company' => 'Company 1',
                'mode_of_class' => 'Online',
                'time_for_class' => 'Morning',
                'created_at' => Carbon::now()
            ],
            [
                'program_id' => 2,
                'fullname' => 'Jane Doe',
                'email' => 'jane@gmail.com',
                'phone' => '0987654321',
                'whatsapp' => '0987654321',
                'gender' => 'Female',
                'country' => 'Country 2',
                'enrollment_date' => now(),
                'occupation' => 'Occupation 2',
                'field_of_study' => 'Field of Study 2',
                'company' => 'Company 2',
                'mode_of_class' => 'Offline',
                'time_for_class' => 'Afternoon',
                'created_at' => Carbon::now()
            ]       
        ]);
    }
}
