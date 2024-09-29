<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $users=[
        ['name'=>'nazmuls','email'=>'nazmul@gmail.com','password'=>'12345678'],
        ['name'=>'ruma','email'=>'ruma@gmail.com','password'=>'12345678'],
        ['name'=>'arjun','email'=>'arjun@gmail.com','password'=>'12345678'],

       ];
       User::insert( $users);
    }
}
