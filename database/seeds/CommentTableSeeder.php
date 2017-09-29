<?php

use Illuminate\Database\Seeder;
use Charis\Models\Comment;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::truncate();
        factory(Comment::class, 400)->create();
    }
}
