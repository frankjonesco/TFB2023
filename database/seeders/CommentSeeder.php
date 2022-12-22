<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Comment;
use App\Models\Company;
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
        // Import comments
        $comments = Comment::on('mysql_import')->get();

        foreach($comments as $comment){

            $user_id = User::where('old_id', $comment->user_id)->first() ? User::where('old_id', $comment->user_id)->first()->id : null;
            $resource_id = Company::where('old_id', $comment->resource_id)->first() ? Company::where('old_id', $comment->resource_id)->first()->id : null;

            if($resource_id){
                Comment::create([
                    'user_id' => $user_id,
                    'resource_type' => $comment->resource_type,
                    'resource_id' => $resource_id,
                    'body' => $comment->comment
                ]);
            }
        }

        // DUMMY ARTICLE COMMENTS
        Comment::create([
            'user_id' => $user_id,
            'resource_type' => $comment->resource_type,
            'resource_id' => $resource_id,
            'body' => $comment->comment
        ]);
    }
}
