<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = [

            [

                'name' => 'Maryrose Montebon',
                'email' => 'maryrosemontebon.com',
                'password' => bcrypt('password123'),
            ],

            [
                'name' => 'Rose Palingcod',
                'email' => 'roser@gmail.com',
                'password' => bcrypt('password123'),
            ],
            [
                'name' => 'Jessa Smith',
                'email' => 'jessasmith134@gmail.com',
                'password' => bcrypt('password123'),
            ],

        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
