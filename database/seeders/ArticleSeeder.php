<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        $articles = Article::on('mysql_import')->get();

        foreach($articles as $article){
            
            Article::insert([
                'hex' => $article->hex,
                'user_id' => $article->user_id,
                'partner_id' => $article->partner_id,
                'title' => $article->title,
                'slug' => $article->slug,
                'caption' => $article->caption,
                'body' => $article->body,
                'image' => $article->image,
                'image_caption' => $article->image_caption,
                'image_copyright' => $article->image_copyright,
                'views' => $article->views,
                'created_at' => $article->created_at,
                'updated_at' => $article->updated_at,
                'status' => $article->status
            ]);

        }

    }
}
