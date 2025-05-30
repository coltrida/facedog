<?php

namespace Database\Seeders;

use App\Models\Reply;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reply::insert([
           [
               'comment_id' => 1,
               'user_id' => 2,
               'body' => 'ottimo commento',
               'created_at' => Carbon::now()
           ],
            [
                'comment_id' => 1,
                'user_id' => 4,
                'body' => 'brutto commento',
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
