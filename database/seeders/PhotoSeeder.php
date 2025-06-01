<?php

namespace Database\Seeders;

use App\Models\Photo;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Photo::insert([
            [
                'album_id' => 1,
                'body' => 'prima foto',
                'created_at' => Carbon::now()->subDays(2)
            ],
            [
                'album_id' => 1,
                'body' => 'seconda foto',
                'created_at' => Carbon::now()
            ],
            [
                'album_id' => 2,
                'body' => 'terza foto',
                'created_at' => Carbon::now()->subDays(1)
            ],
            [
                'album_id' => 2,
                'body' => 'quarta foto',
                'created_at' => Carbon::now()->subDays(2)
            ],
            [
                'album_id' => 3,
                'body' => 'quinta foto',
                'created_at' => Carbon::now()->subDays(3)
            ],
            [
                'album_id' => 3,
                'body' => 'sesta foto',
                'created_at' => Carbon::now()->subDays(4)
            ],
            [
                'album_id' => 3,
                'body' => 'settima foto',
                'created_at' => Carbon::now()->subDays(5)
            ],
        ]);
    }
}
