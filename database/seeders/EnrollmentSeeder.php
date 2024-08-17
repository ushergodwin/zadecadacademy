<?php

namespace Database\Seeders;

use App\Models\Enrollment;
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
                'program' => 1,
                'firstname' => 'John',
                'lastname' => 'Doe',
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
            ],
            [
                'program' => 2,
                'firstname' => 'Jane',
                'lastname' => 'Doe',
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
            ],
            [
                'program' => 3,
                'firstname' => 'Mike',
                'lastname' => 'Smith',
                'phone' => '1122334455',
                'whatsapp' => '1122334455',
                'gender' => 'Male',
                'country' => 'Country 3',
                'enrollment_date' => now(),
                'occupation' => 'Occupation 3',
                'field_of_study' => 'Field of Study 3',
                'company' => 'Company 3',
                'mode_of_class' => 'Online',
                'time_for_class' => 'Evening',
            ],
            [
                'program' => 4,
                'firstname' => 'Sara',
                'lastname' => 'Johnson',
                'phone' => '5566778899',
                'whatsapp' => '5566778899',
                'gender' => 'Female',
                'country' => 'Country 4',
                'enrollment_date' => now(),
                'occupation' => 'Occupation 4',
                'field_of_study' => 'Field of Study 4',
                'company' => 'Company 4',
                'mode_of_class' => 'Offline',
                'time_for_class' => 'Night',
            ],
        ]);
    }
}
