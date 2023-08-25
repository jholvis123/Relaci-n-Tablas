<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CommentSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        $postIds = DB::table('posts')->pluck('id');

        for ($i = 0; $i < 16; $i++) {
            $postId = $postIds->random();
            DB::table('comments')->insert([
                'post_id' => $postId,
                'comment' => Str::random(20),
            ]);

        
        }
    }
}
