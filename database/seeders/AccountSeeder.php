<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Account;
use App\Models\Employee;
use Illuminate\Support\Arr;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = Employee::all();

        foreach ($employees as $employee) {
            $account = Account::where('user_id', $employee->user_id)->first();
            if ($account) {
                $account->job = $employee->job;
                $account->save();
            }
        }

        $accounts = [
            [
                'user_id' => 1,
                'fname' => 'Maryrose ',
                'lname' => 'Montebon',
                'address' => 'Tubigon, Bohol.',
                'email' => 'maryrosemontebo3@gmail.com',
                'phone_no' => '09457542829',
            ],
            [
                'user_id' => 2,
                'fname' => 'Lira',
                'lname' => 'Bubun',
                'address' => 'Clarin, Bohol.',
                'email' => 'archer.tarius@gmail.com',
                'phone_no' => '09557562829',
            ],
            [
                'user_id' => 3,
                'fname' => 'Mary Joy',
                'lname' => 'Patac',
                'address' => 'Panglao, Bohol.',
                'email' => 'patacmaryjoy@gmail.com',
                'phone_no' => '09497562829',
            ],


        ];

        foreach ($accounts as $acc) {

            $job = Arr::random(['MANAGER', 'SUPERVISOR', 'CASHIER', 'PROMODISER', 'BAGGER']);

            Account::create([
                'user_id' => $acc['user_id'],
                'fname' => $acc['fname'],
                'lname' => $acc['lname'],
                'address' => $acc['address'],
                'email' => $acc['email'],
                'phone_no' => $acc['phone_no'],
                'job' => $job,
            ]);
        }
    }
}
