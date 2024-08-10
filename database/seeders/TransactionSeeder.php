<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Transaction::insert([
            [
                'transaction_id' => 123456,
                'amount' => 100.00,
                'currency' => 'USD',
                'user_id' => 1,
                'course_id' => 1,
                'flw_ref' => 'FLW123456',
                'status' => 'completed',
                'date_added' => now(),
            ],
            [
                'transaction_id' => 654321,
                'amount' => 200.00,
                'currency' => 'USD',
                'user_id' => 2,
                'course_id' => 2,
                'flw_ref' => 'FLW654321',
                'status' => 'completed',
                'date_added' => now(),
            ],
            [
                'transaction_id' => 112233,
                'amount' => 300.00,
                'currency' => 'USD',
                'user_id' => 3,
                'course_id' => 3,
                'flw_ref' => 'FLW112233',
                'status' => 'completed',
                'date_added' => now(),
            ],
            [
                'transaction_id' => 332211,
                'amount' => 400.00,
                'currency' => 'USD',
                'user_id' => 4,
                'course_id' => 4,
                'flw_ref' => 'FLW332211',
                'status' => 'completed',
                'date_added' => now(),
            ],
        ]);
    }
}
