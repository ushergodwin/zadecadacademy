<?php

namespace Database\Seeders;

use App\Models\SiteUser;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SiteUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        SiteUser::insert([
            [
                'username' => 'johndoe',
                'email' => 'john@example.com',
                'password' => Hash::make('password'),
                'reset_code' => '123456',
                'status' => 1,
                'phone' => '1234567890',
                'names' => 'John Doe',
                'male' => 'Male',
                'created_at' => Carbon::now()
            ],
            [
                'username' => 'janedoe',
                'email' => 'jane@example.com',
                'password' => Hash::make('password'),
                'reset_code' => '654321',
                'status' => 1,
                'phone' => '0987654321',
                'names' => 'Jane Doe',
                'male' => 'Female',
                'created_at' => Carbon::now()
            ],
            [
                'username' => 'mikesmith',
                'email' => 'mike@example.com',
                'password' => Hash::make('password'),
                'reset_code' => '112233',
                'status' => 1,
                'phone' => '1122334455',
                'names' => 'Mike Smith',
                'male' => 'Male',
                'created_at' => Carbon::now()
            ],
            [
                'username' => 'sarajohnson',
                'email' => 'sara@example.com',
                'password' => Hash::make('password'),
                'reset_code' => '332211',
                'status' => 1,
                'phone' => '5566778899',
                'names' => 'Sara Johnson',
                'male' => 'Female',
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
