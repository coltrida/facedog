<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
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
                'surname' => 'admin',
                'username' => 'admin',
                'birthdate' => Carbon::now(),
                'phone' => '3387525652',
                'role' => 'admin',
                'description' => '',
                'email' => 'admin@admin.it',
                'password' => Hash::make('123456')
            ],
            [
                'name' => 'davide',
                'surname' => 'colt',
                'username' => 'cacao',
                'birthdate' => Carbon::now(),
                'phone' => '3387525652',
                'role' => 'user',
                'description' => 'sono un gattino birichino',
                'email' => 'cacao@cacao.it',
                'password' => Hash::make('123456')
            ],
            [
                'name' => 'mario',
                'surname' => 'rossi',
                'username' => 'cacao2',
                'birthdate' => Carbon::now(),
                'phone' => '3387525652',
                'role' => 'user',
                'description' => 'sono un cane feroce',
                'email' => 'cacao2@cacao.it',
                'password' => Hash::make('123456')
            ],
        ]);

        User::factory()
            ->count(50)
            ->hasPosts(2)
            ->create();
    }
}
