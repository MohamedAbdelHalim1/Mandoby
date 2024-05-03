<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // Hash the password "123456"
          $hashedPassword = Hash::make('123456');

          User::create([
              'name' => 'admin',
              'email' => 'admin@admin.com',
              'role' => 'admin',
              'password' => $hashedPassword,
          ]);

          User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'role' => 'user',
            'password' => $hashedPassword,
        ]);
    }
}
