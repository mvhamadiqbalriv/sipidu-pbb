<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'sipidu',
            'username' => 'sipidupbb',
            'email' => 'sipidupbb@gmail.com',
            'level' => 'Admin',
            'password' => Hash::make('password'),
        ]);
    }
}
