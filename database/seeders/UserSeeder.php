<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'admin',
                'role' => 'admin',
                'email' => 'admin@admin.it',
                'password' => Hash::make('123456')
            ],
            [
                'name' => 'cacao',
                'role' => 'user',
                'email' => 'cacao@cacao.it',
                'password' => Hash::make('123456')
            ],
            [
                'name' => 'cacao2',
                'role' => 'user',
                'email' => 'cacao2@cacao.it',
                'password' => Hash::make('123456')
            ],
        ]);
    }
}
