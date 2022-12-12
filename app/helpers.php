<?php

use App\Models\Sponsor;
use Illuminate\Support\Facades\Config;

    // Settings: date_format
    if(!function_exists('showDate')){
        function showDate($date){
            $format = Config::get('date_format');
            return $date->format($format);
        }
    }

    // Nav sponsors
    if(!function_exists('navSponsors')) {
        function navSponsors(){
            return Sponsor::where('show_in_navbar', true)->get();
        }
    }

    // Linkify
    if(!function_exists('linkify')){
        function linkify($text) {
            return preg_replace('@(https?://([-\w\.]+)+(:\d+)?(/([\w/_\.%-=#]*(\?\S+)?)?)?)@', '<a href="$1">$1</a>', $text);
        }
    }


    // Compile article details
    if(!function_exists('compileArticleDetails')){
        function compileArticleDetails($article) {
            return [
                [
                    'label' => 'Created by',
                    'result' => $article->user->full_name
                ],
                [
                    'label' => 'Created at',
                    'result' => $article->created_at
                ],
                [
                    'label' => 'Updated at',
                    'result' => $article->updated_at
                ],
                [
                    'label' => 'Views',
                    'result' => $article->views === null ? '<span class="no-results">None</span>' : $article->views
                ],
                [
                    'label' => 'Comments',
                    'result' => count($article->comments) == 0 ? '<span class="no-results">None</span>' : count($article->comments)
                ],
                [
                    'label' => 'Likes',
                    'result' => $article->likes === null ? '<span class="no-results">None</span>' : $article->likes
                ],
                [
                    'label' => 'Dislikes',
                    'result' => $article->dislikes === null ? '<span class="no-results">None</span>' : $article->dislikes
                ],
                [
                    'label' => 'Hex',
                    'result' => $article->hex
                ],
                [
                    'label' => 'Sector',
                    'result' => $article->sector === null ? '<span class="no-results">Not assigned</span>' : $article->sector
                ],
                [
                    'label' => 'Category',
                    'result' => $article->category === null ? '<span class="no-results">Not assigned</span>' : $article->category
                ],
                [
                    'label' => 'Sponsor',
                    'result' => $article->sponsor === null ? '<span class="no-results">No sponsor</span>' : $article->sponsor
                ],
                [
                    'label' => 'Tags',
                    'result' => $article->tags === null ? '<span class="no-results">No tags added</span>' : $article->tags
                ],
                [
                    'label' => 'Status',
                    'result' => ucfirst($article->status)
                ],
            ];
        }
    }


    

    
