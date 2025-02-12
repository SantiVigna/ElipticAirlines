<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => 'admin123',
                'isAdmin' => true,
            ],
            [
                'name' => 'User',
                'email' => 'ynotvigna@gmail.com',
                'password' => 'user123',
                'isAdmin' => false,
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
