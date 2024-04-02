<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash; 

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            //Admin

            [
                'name' =>'Admin',
                'student_id' => '21-03616',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin1234'),
                'user_role'=> 'admin',
            ],

            [
                'name' =>'Officer',
                'student_id' => '21-03617',
                'email' => 'officer@gmail.com',
                'password' => Hash::make('officer1234'),
                'user_role'=> 'officer',
            ],
            [
                'name' =>'Student',
                'student_id' => '21-03618',
                'email' => 'student@gmail.com',
                'password' => Hash::make('student1234'),
                'user_role'=> 'student',
            ]


            ]);
    }
}
