<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments = Comment::on('mysql_import')->get();

        foreach($comments as $comment){
        
            Comment::create([
                'user_id' => $comment->user_id,
                'parent_id' => $comment->parent_id,
                'resource_type' => $comment->resource_type,
                'resource_id' => $comment->resource_id,
                'author_name' => $comment->author_name,
                'author_email' => $comment->author_email,
                'title' => $comment->title,
                'body' => $comment->body,
                'created_at' => $comment->created_at,
                'updated_at' => $comment->updated_at,
                'status' => $comment->status
            ]);
        
        }
    
    }
}
