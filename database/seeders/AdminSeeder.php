<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'rizal@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 1
        ]);
        User::create([
            'name' => 'Rizal',
            'email' => 'rizal@gmail.com',
            'password' => Hash::make('1'),
            'role_id' => 1
        ]);
        User::create([
            'name' => 'Steven',
            'email' => 'rizal@gmail.com',
            'password' => Hash::make('1'),
            'role_id' => 2
        ]);
    }
}