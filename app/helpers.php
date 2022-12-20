<?php

use App\Models\Sponsor;
use Illuminate\Support\Facades\Config;

    // Show date
    if(!function_exists('showDate')){
        function showDate($date){
            $date_format = Config::get('date_format');
            return $date->format($date_format);
        }
    }

    // Show date/time
    if(!function_exists('showDateTime')){
        function showDateTime($date){
            $date_format = Config::get('date_format');
            $time_format = Config::get('time_format');
            return $date->format($date_format.' - '.$time_format);
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
                    'result' => showDateTime($article->created_at),
                    'icon' => 'fa-regular fa-calendar'
                ],
                [
                    'label' => 'Updated at',
                    'result' => showDateTime($article->updated_at),
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
                // [
                //     'label' => 'Likes',
                //     'result' => $article->likes === null ? '<span class="no-results">None</span>' : $article->likes,
                //     'icon' => 'fa-regular fa-thumbs-up'
                // ],
                // [
                //     'label' => 'Dislikes',
                //     'result' => $article->dislikes === null ? '<span class="no-results">None</span>' : $article->dislikes,
                //     'icon' => 'fa-regular fa-thumbs-down'
                // ],
                [
                    'label' => 'ID',
                    'result' => $article->id,
                    'icon' => 'fa-solid fa-database'
                ],
                [
                    'label' => 'Hex',
                    'result' => $article->hex,
                    'icon' => 'fa-solid fa-fingerprint'
                ],
                // [
                //     'label' => 'Sector',
                //     'result' => $article->sector === null ? '<span class="no-results">Not assigned</span>' : $article->sector,
                //     'icon' => 'fa-regular fa-building'
                // ],
                [
                    'label' => 'Category',
                    'result' => $article->category === null ? '<span class="no-results">Not assigned</span>' : '<a href="/dashboard/categories/'.$article->category->hex.'">'.$article->category->name.'</a>',
                    'icon' => 'fa-regular fa-folder'
                ],
                [
                    'label' => 'Sponsor',
                    'result' => $article->sponsor === null ? '<span class="no-results">No sponsor</span>' : $article->sponsor,
                    'icon' => 'fa-solid fa-award'
                ],
                [
                    'label' => 'Tags',
                    'result' => $article->tags === null ? '<span class="no-results">No tags added</span>' : $article->renderTags(),
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

    // Compile company details
    if(!function_exists('compileCompanyDetails')){
        function compileCompanyDetails($company){
            return [
                [
                    'label' => 'Owner',
                    'result' => $company->user->full_name,
                    'icon' => 'fa-regular fa-user'
                ],
                [
                    'label' => 'Created at',
                    'result' => showDateTime($company->created_at),
                    'icon' => 'fa-regular fa-calendar'
                ],
                [
                    'label' => 'Updated at',
                    'result' => showDateTime($company->updated_at),
                    'icon' => 'fa-regular fa-calendar'
                ],
                [
                    'label' => 'Views',
                    'result' => $company->views === null ? '<span class="no-results">None</span>' : $company->views,
                    'icon' => 'fa-regular fa-eye'
                ],
                [
                    'label' => 'Comments',
                    'result' => count($company->comments) == 0 ? '<span class="no-results">None</span>' : count($company->comments),
                    'icon' => 'fa-regular fa-comments'
                ],
                [
                    'label' => 'ID',
                    'result' => $company->id,
                    'icon' => 'fa-solid fa-database'
                ],
                [
                    'label' => 'Hex',
                    'result' => $company->hex,
                    'icon' => 'fa-solid fa-fingerprint'
                ],
                [
                    'label' => 'Status',
                    'result' => ucfirst($company->status),
                    'icon' => 'fa-solid fa-lock'
                ],
            ];
        }
    }

    //  Format tags
    if(!function_exists('formatTags')){
        function formatTags($tags){
            $tags = explode(',', $tags);
            $trimmed_tags = [];
            foreach($tags as $tag){
                $tag = preg_replace('/[^A-Za-z0-9\, ]/', '', $tag);
                $words = explode(' ', $tag);
                $tag = [];
                foreach($words as $word){
                    $tag[] = $word;
                }
                $tag = implode(' ', array_filter($tag));
                $trimmed_tags[] = trim($tag);
            }
            $tags = implode(',', array_filter($trimmed_tags));

            return $tags;
        }
    }


    

    
