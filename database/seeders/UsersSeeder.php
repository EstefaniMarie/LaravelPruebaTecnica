<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        $hashedPasswordAdmin = bcrypt('12345678');
        $hashedPasswordUser = bcrypt('12345678');
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'correo' => 'admin@example.com',
                'password' => $hashedPasswordAdmin,
                'roles_id' => 1
            ],
            [
                'name' => 'usuario',
                'correo' => 'user@example.com',
                'password' => $hashedPasswordUser,
                'roles_id' => 2
            ]
        ]);
    }
}


