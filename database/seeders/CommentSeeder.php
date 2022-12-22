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
            'user_id' => 6,
            'resource_type' => 'article',
            'resource_id' => 300,
            'body' => 'Very interesting article. Excellent comparison from neutral ground.'
        ]);

        Comment::create([
            'user_id' => 5,
            'resource_type' => 'article',
            'resource_id' => 305,
            'body' => 'I would have said I do not agree with this. Having worked in the industry for 20 years, I\'m not sure this makes sense.'
        ]);

        Comment::create([
            'user_id' => 7,
            'resource_type' => 'article',
            'resource_id' => 302,
            'body' => 'Probably the best article I read on this subject, and I\' read a lot!'
        ]);

        Comment::create([
            'user_id' => 8,
            'resource_type' => 'article',
            'resource_id' => 309,
            'body' => 'Maybe should have thout about that before? Lol!'
        ]);
    }
}
