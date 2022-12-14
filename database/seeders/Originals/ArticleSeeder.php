<?php

namespace Database\Seeders;

use App\Models\Site;
use App\Models\User;
use App\Models\Article;
use Illuminate\Support\Str;
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
        // $articles = [
        //     [
        //         'hex' => Str::random(11),
        //         'user_id' => 1,
        //         'sector_id' => 3,
        //         'category_id' => 2,
        //         'title' => 'McDonalds releases new eco-friednly Happy Meals',
        //         'slug' =>  'mcdonalds-releases-new-eco-friednly-happy-meals',
        //         'body' => 'This is the article body text.',
        //         'status' => 'public'
        //     ],
        //     [
        //         'hex' => Str::random(11),
        //         'user_id' => 1,
        //         'sector_id' => 2,
        //         'category_id' => 1,
        //         'title' => 'Barclays will become a paperless business by 2050',
        //         'slug' =>  'barclays-will-become-a-paperless-business-by-2050',
        //         'body' => 'This is the article body text.',
        //         'status' => 'public'
        //     ],
        //     [
        //         'hex' => Str::random(11),
        //         'user_id' => 1,
        //         'sector_id' => 3,
        //         'category_id' => 2,
        //         'title' => 'NASA will move all spaceships to Mars',
        //         'slug' =>  'nasa-will-move-all-spaceships-to-mars',
        //         'body' => 'This is the article body text.',
        //         'status' => 'public'
        //     ],
        //     [
        //         'hex' => Str::random(11),
        //         'user_id' => 1,
        //         'sector_id' => 4,
        //         'category_id' => 4,
        //         'title' => 'Animal King has announce a change in it\'s R & D',
        //         'slug' =>  'animal-king-has-announce-a-change-in-its-r-and-d',
        //         'body' => 'This is the article body text.',
        //         'status' => 'public'
        //     ],
        // ];

        // collect($articles)->each(function($article){ Article::create($article); });






        // Import articles
        $articles = Article::on('mysql_import')->get();

        // Create articles
        foreach($articles as $article){

            // User ID
            $ids = [1,2,3,4];
            $random_user_id = $ids[array_rand($ids)];
            if($article->user_id != ''){
                $user = User::where('old_id', $article->user_id)->first();
                $user_id = $user ? $user->id : $random_user_id;
            }           

            // Wrap main_text in <p> if it does not containe html tags
            $body = $article->main_text;
            if(!preg_match ('/<[^>]*>/', $body)){
                $body = '<p>'.$body.'</p>';
            }

            if($article->teaser){
                $body = '<blockquote>'.$article->teaser.'</blockquote>'.$body;
            }

            if($article->caption){
                if($article->caption == ''){
                    $article->caption = null;
                }
            }

            // Create article
            Article::insert([

                'old_id' => $article->id,
                'hex' => Str::random(11),
                'user_id' => $user_id,
                'partner_id' => $article->sponsor,
                'title' => $article->title,
                'slug' => $article->url_title,
                'caption' => $article->caption,
                'body' => $body,
                'image' => $article->image,
                'image_caption' => $article->image_caption,
                'image_copyright' => $article->image_copyright,
                'views' => $article->views,
                'created_at' => date('Y-m-d H:i:s', $article->created),
                'updated_at' => date('Y-m-d H:i:s', $article->updated),
                'status' => $article->status
            ]);
        }

        // Import articles
        $articles = Article::get();

        // Create articles
        foreach($articles as $article){
            // Acquisitions
            if(in_array($article->id, [84,21])){
                $article->category_id = 1;
            }
            // Shareholdings
            if(in_array($article->id, [266])){
                $article->category_id = 2;
            }
            // Innovation
            if(in_array($article->id, [249,217])){
                $article->category_id = 3;
            }
            //Sustainability
            if(in_array($article->id, [22,271])){
                $article->category_id = 4;
            }
            // Resignations
            if(in_array($article->id, [28])){
                $article->category_id = 5;
            }
            // Growth
            if(in_array($article->id, [257,294,210,233])){
                $article->category_id = 6;
            }
            // Decline
            if(in_array($article->id, [115])){
                $article->category_id = 7;
            }
            // Tolerance
            if(in_array($article->id, [157])){
                $article->category_id = 8;
            }
            // Investments
            if(in_array($article->id, [252])){
                $article->category_id = 9;
            }
            // Partnerships
            if(in_array($article->id, [265])){
                $article->category_id = 10;
            }
            $article->save();
        }

        // HANDLE IMAGE TRANSFER
        $site = new Site();
        $site->handleImageTransfer('articles', Article::all());
    }
}
