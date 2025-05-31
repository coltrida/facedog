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
        User::create([
                'name' => 'admin',
                'surname' => 'admin',
                'username' => 'admin',
                'type' => 'admin',
                'city' => 'Roma',
                'birthdate' => Carbon::now(),
                'phone' => '3387525652',
                'role' => 'admin',
                'description' => '',
                'email' => 'admin@admin.it',
                'password' => Hash::make('123456')
        ]);

        User::factory()->hasPosts(2)->create([
                'name' => 'davide',
                'surname' => 'colt',
                'username' => 'cacao',
                'type' => 'pastore tedesco',
                'city' => 'Roma',
                'birthdate' => Carbon::now(),
                'phone' => '3387525652',
                'role' => 'user',
                'description' => 'sono un ferocissimo pastore tedesco che vuole conoscere tante cagnette',
                'email' => 'cacao@cacao.it',
                'password' => Hash::make('123456')
            ]);

        User::factory()->hasPosts(2)->create([
                'name' => 'mario',
                'surname' => 'rossi',
                'username' => 'cacao2',
                'type' => 'gatto soriano',
                'city' => 'Milano',
                'birthdate' => Carbon::now(),
                'phone' => '3387525652',
                'role' => 'user',
                'description' => 'sono un cane feroce',
                'email' => 'cacao2@cacao.it',
                'password' => Hash::make('123456')
        ]);

        User::factory()->hasPosts(2)->create([
            'name' => 'gianni',
            'surname' => 'rivera',
            'username' => 'cacao3',
            'type' => 'gatto blu',
            'city' => 'Genova',
            'birthdate' => Carbon::now(),
            'phone' => '3387525652',
            'role' => 'user',
            'description' => 'sono un gatto blu',
            'email' => 'cacao3@cacao.it',
            'password' => Hash::make('123456')
        ]);

        User::factory()
            ->count(50)
            ->hasPosts(2)
            ->create();
    }
}
