<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();
        User::insert([
            [
                'name' => 'waitress',
                'email' => 'waitress@gmail.com',
                'password' => Hash::make('123'),
                'role_id' => 1
            ],
            [
        'name' => 'chef',
        'email' => 'chef@gmail.com',
        'password' => Hash::make('123'),
        'role_id' => 2
        ],
        [
            'name' => 'cashier',
            'email' => 'cashier@gmail.com',
            'password' => Hash::make('123'),
            'role_id' => 3
        ],
        [
            'name' => 'manager',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('123'),
            'role_id' => 4
        ],
    ]); */
    }
}
