<?php

namespace Database\Seeders;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Contact::insert([
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'subject' => 'Test Subject 1',
                'message' => 'This is a test message 1.',
                'date_time' => now(),
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'jane@example.com',
                'subject' => 'Test Subject 2',
                'message' => 'This is a test message 2.',
                'date_time' => now(),
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Mike Smith',
                'email' => 'mike@example.com',
                'subject' => 'Test Subject 3',
                'message' => 'This is a test message 3.',
                'date_time' => now(),
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Sara Johnson',
                'email' => 'sara@example.com',
                'subject' => 'Test Subject 4',
                'message' => 'This is a test message 4.',
                'date_time' => now(),
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
