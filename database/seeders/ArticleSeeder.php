<?php

namespace Database\Seeders;

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
        $articles = [
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_id' => 3,
                'category_id' => 2,
                'title' => 'McDonalds releases new eco-friednly Happy Meals',
                'slug' =>  'mcdonalds-releases-new-eco-friednly-happy-meals',
                'body' => 'This is the article body text.',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_id' => 2,
                'category_id' => 1,
                'title' => 'Barclays will become a paperless business by 2050',
                'slug' =>  'barclays-will-become-a-paperless-business-by-2050',
                'body' => 'This is the article body text.',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_id' => 3,
                'category_id' => 2,
                'title' => 'NASA will move all spaceships to Mars',
                'slug' =>  'nasa-will-move-all-spaceships-to-mars',
                'body' => 'This is the article body text.',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_id' => 4,
                'category_id' => 4,
                'title' => 'Animal King has announce a change in it\'s R & D',
                'slug' =>  'animal-king-has-announce-a-change-in-its-r-and-d',
                'body' => 'This is the article body text.',
                'status' => 'public'
            ],
        ];

        collect($articles)->each(function($article){ Article::create($article); });
    }
}
