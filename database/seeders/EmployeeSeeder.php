<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Account;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    // {
    //     Student::factory(10)->create();
    // }

    {
        $employees = [
            [
                'fname' => 'Maryrose',
                'lname' => 'Montebon',
                'age' => '29',
                'address' => 'Tubigon, Bohol',
                'job' => 'Manager',
                'year' => 'Four Year',
            ],
            [
                'fname' => 'Veronica',
                'lname' => 'Harley',
                'age' => '31',
                'address' => 'Sagbayan, Bohol',
                'job' => 'Supervisor',
                'year' => 'One Year',
            ],
            [
                'fname' => 'Elgene',
                'lname' => 'Buaya',
                'age' => '24',
                'address' => 'Calape, bohol',
                'job' => 'Cashier',
                'year' => 'Seven Year',
            ],
            [
                'fname' => 'Leonor',
                'lname' => 'Calapuan',
                'age' => '32',
                'address' => 'Jagna, Bohol',
                'job' => 'Promodiser',
                'year' => 'Five Year',
            ],
        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
