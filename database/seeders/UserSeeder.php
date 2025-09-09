<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Ahmad Syaefudin',
            'email' => 'ahmad@gmail.com',
            'password' => Hash::make('wali123'),
            'role' => 'guru', // ganti dari 'wali' ke 'guru'
        ]);

        User::create([
            'name' => 'Adiva Sekar Maharani',
            'email' => 'adiva@example.com',
            'password' => Hash::make('adiva123'),
            'role' => 'siswa',
        ]);
    }
}
