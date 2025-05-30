<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FollowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::with('followers')->find(2);
        $user->followers()->attach(3, [
            'created_at' => Carbon::now()->subDays(3)
        ]);
        $user->followers()->attach(4, [
            'created_at' => Carbon::now()
        ]);
    }
}
