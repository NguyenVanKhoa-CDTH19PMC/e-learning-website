<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
      

        DB::table('users')->insert([
            [
                'name' => 'Student',
                'email' => 'student@gmail.com',
                'password' => bcrypt('11111111'),
                'avatar'=>'author-01.png',
                'level'=> 'student'
            ]
        ]);
        DB::table('users')->insert([
            [
                'name' => 'Teacher',
                'email' => 'teacher@gmail.com',
                'password' => bcrypt('11111111'),
                'avatar'=>'author-02.png',
                'level'=> 'teacher'
            ]
        ]);
    }
}