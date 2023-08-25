<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'zumuha',
            'email' => 'zumuha@gmail.com',
            'password' => Hash::make('sawswng78'),
            'is_admin' => 1, // Assuming you have an is_admin column in users table to distinguish between admin and regular users
        ]);
    }
}
