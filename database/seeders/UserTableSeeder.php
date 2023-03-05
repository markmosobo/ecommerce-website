<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Mark',
            'last_name' => 'Mosobo',
            'role' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456')
        ]);

        User::create([
            'first_name' => 'Camilla',
            'last_name' => 'Makira',
            'role' => 'seller',
            'email' => 'seller@gmail.com',
            'password' => Hash::make('123456')
        ]);

        User::create([
            'first_name' => 'Camilla',
            'last_name' => 'Makira',
            'role' => 'admin',
            'email' => 'buyer@gmail.com',
            'password' => Hash::make('123456')
        ]);
    }
}
