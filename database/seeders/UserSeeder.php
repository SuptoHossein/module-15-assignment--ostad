<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name'=>'Munna','email'=>'admin@gmail.com','password'=>bcrypt(1111)],
            ['name'=>'Sakib','email'=>'sakib@gmail.com','password'=>bcrypt(1111)]
        ];

        foreach ($users as $key => $user) {
            User::updateOrcreate([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
            ]);
        }
    }
}
