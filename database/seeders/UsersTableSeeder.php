<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            //  AdminLayout
            [
                'name' => 'AdminLayout',
                'username' => 'AdminLayout',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'admin',
                'status' => 'active',
            ],
            //  Agent
            [
                'name' => 'Comum',
                'username' => 'Comum',
                'email' => 'comum@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'comum',
                'status' => 'active',
            ],
        ]);
    }
}
