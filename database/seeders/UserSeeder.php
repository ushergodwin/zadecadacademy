<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::insert([
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'contact' => '1234567890',
                'role' => 'admin',
                'reset_code' => '123456',
                'active' => '1',
                'plain_password' => 'password',
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Doe',
                'email' => 'jane@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'contact' => '0987654321',
                'role' => 'user',
                'reset_code' => '654321',
                'active' => '1',
                'plain_password' => 'password',
            ],
            [
                'first_name' => 'Mike',
                'last_name' => 'Smith',
                'email' => 'mike@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'contact' => '1122334455',
                'role' => 'user',
                'reset_code' => '112233',
                'active' => '1',
                'plain_password' => 'password',
            ],
            [
                'first_name' => 'Sara',
                'last_name' => 'Johnson',
                'email' => 'sara@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'contact' => '5566778899',
                'role' => 'user',
                'reset_code' => '332211',
                'active' => '1',
                'plain_password' => 'password',
            ],
        ]);
    }
}
