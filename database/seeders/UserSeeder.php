<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
            'username' => env('SECRET_USERNAME'),
            'email' => env('SECRET_EMAIL'),
            'password' => bcrypt(env('SECRET_PASSWORD')),
            'role' => 'admin'
        ]);
    }
}
