<?php

namespace Database\Seeders;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::insert([
            [
               'post_id' => 1,
               'user_id' => 3,
               'body' => 'bellissimo, stupendo, meraviglioso',
               'created_at' => Carbon::now(),
            ],
            [
                'post_id' => 1,
                'user_id' => 4,
                'body' => 'sdafdsfasfd asdfadsfadsfadsf ldskjaf òldskj fòlkadsj fòsda lfòkjdsa òflkdsjaòlkf òlskadj fòladsk jfòkladsj ',
                'created_at' => Carbon::now(),
            ],
            [
                'post_id' => 2,
                'user_id' => 4,
                'body' => 'brutto',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
