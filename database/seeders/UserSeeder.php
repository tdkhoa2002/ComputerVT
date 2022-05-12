<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role_id' => 1,
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'is_block' => 0,
            'password' => Hash::make('123123123')
        ]);

        User::create([
            'role_id' => 2,
            'name' => 'user',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'is_block' => 0,
            'password' => Hash::make('123123123')
        ]);
    }
}
