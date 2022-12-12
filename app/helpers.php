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
                    'result' => $article->user->full_name,
                    'icon' => 'fa-regular fa-user'
                ],
                [
                    'label' => 'Created at',
                    'result' => showDate($article->created_at),
                    'icon' => 'fa-regular fa-calendar'
                ],
                [
                    'label' => 'Updated at',
                    'result' => showDate($article->updated_at),
                    'icon' => 'fa-regular fa-calendar'
                ],
                [
                    'label' => 'Views',
                    'result' => $article->views === null ? '<span class="no-results">None</span>' : $article->views,
                    'icon' => 'fa-regular fa-eye'
                ],
                [
                    'label' => 'Comments',
                    'result' => count($article->comments) == 0 ? '<span class="no-results">None</span>' : count($article->comments),
                    'icon' => 'fa-regular fa-comments'
                ],
                [
                    'label' => 'Likes',
                    'result' => $article->likes === null ? '<span class="no-results">None</span>' : $article->likes,
                    'icon' => 'fa-regular fa-thumbs-up'
                ],
                [
                    'label' => 'Dislikes',
                    'result' => $article->dislikes === null ? '<span class="no-results">None</span>' : $article->dislikes,
                    'icon' => 'fa-regular fa-thumbs-down'
                ],
                [
                    'label' => 'Hex',
                    'result' => $article->hex,
                    'icon' => 'fa-solid fa-fingerprint'
                ],
                [
                    'label' => 'Sector',
                    'result' => $article->sector === null ? '<span class="no-results">Not assigned</span>' : $article->sector,
                    'icon' => 'fa-regular fa-building'
                ],
                [
                    'label' => 'Category',
                    'result' => $article->category === null ? '<span class="no-results">Not assigned</span>' : $article->category,
                    'icon' => 'fa-regular fa-folder'
                ],
                [
                    'label' => 'Sponsor',
                    'result' => $article->sponsor === null ? '<span class="no-results">No sponsor</span>' : $article->sponsor,
                    'icon' => 'fa-solid fa-award'
                ],
                [
                    'label' => 'Tags',
                    'result' => $article->tags === null ? '<span class="no-results">No tags added</span>' : $article->tags,
                    'icon' => 'fa-solid fa-tags'
                ],
                [
                    'label' => 'Status',
                    'result' => ucfirst($article->status),
                    'icon' => 'fa-regular fa-calendar'
                ],
            ];
        }
    }


    

    
