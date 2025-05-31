<?php

namespace Database\Seeders;

use App\Models\Album;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Album::insert([
            [
                'user_id' => 2,
                'title' => 'first album'
            ],
            [
                'user_id' => 2,
                'title' => 'second album'
            ],
            [
                'user_id' => 2,
                'title' => 'third album'
            ],
            [
                'user_id' => 3,
                'title' => 'primo album'
            ],
        ]);
    }
}
