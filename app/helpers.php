<?php

use App\Models\Article;
use App\Models\Company;
use App\Models\Ranking;
use App\Models\Sponsor;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

    // FORMATTERS

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

    // Linkify
    if(!function_exists('linkify')){
        function linkify($text) {
            return preg_replace('@(https?://([-\w\.]+)+(:\d+)?(/([\w/_\.%-=#]*(\?\S+)?)?)?)@', '<a href="$1">$1</a>', $text);
        }
    }

    // Truncate
    if(!function_exists('truncate')){
        function truncate($str, $limit = 45) {
            return Str::limit($str, $limit);
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

     // Format turnover
     if(!function_exists('formatTurnover')){
        function formatTurnover($turnover){
            return number_format(round($turnover / 1000000), 0, ',' , '.' ).' Mio.';
        }
    }

    // Format employees
    if(!function_exists('formatEmployees')){
        function formatEmployees($employees){
            return number_format(round($employees), 0, ',' , '.' );
        }
    }

    // Format training rate
    if(!function_exists('formatTrainingRate')){
        function formatTrainingRate($training_rate){
            if(!empty($training_rate)){
                return $training_rate.'%';
            }
        }
    }



    // FETCHERS

    // Nav sponsors
    if(!function_exists('navSponsors')) {
        function navSponsors(){
            return Sponsor::where('show_in_navbar', true)->get();
        }
    }

    // Nav sponsors
    if(!function_exists('matchbirdPartners')) {
        function matchbirdPartners(){
            return Company::where('matchbird_partner', 1)->take(9)->orderBy(DB::raw('RAND()'))->get();
        }
    }

    if(!function_exists('rankingYears')){
        function rankingYears(){
            $years = Ranking::select('rankings.year')->orderBy('rankings.year', 'DESC')->groupBy('rankings.year')->get();
            $yearsArray = [];
            foreach($years as $ranking){
                $yearsArray[] = $ranking->year;
            }
            return $yearsArray;
        }
    }



    // ARTICLE FETCHERS

    // Tabbed articles
    if(!function_exists('tabbedArticles')){
        function tabbedArticles(){
            $tabbed_articles['popular'] = Article::where('status', 'public')->latest()->skip(15)->take(5)->get();
            $tabbed_articles['recent'] = Article::where('status', 'public')->latest()->skip(20)->take(5)->get();
            $tabbed_articles['top'] = Article::where('status', 'public')->latest()->skip(25)->take(5)->get();
            return $tabbed_articles;
        }
    }

    // Random articles
    if(!function_exists('randomArticles')){
        function randomArticles($number = 3){
            return Article::where('status', 'public')->orderBy(DB::raw('RAND()'))->take($number)->get();
        }
    }

    // Bulletin messages
    if(!function_exists('bulletinMessages')){
        function bulletinMessages($number = 3){
            return Article::where('status', 'public')->latest()->take($number)->get();
        }
    }
    


    

    // COMPILERS

    // Compile company details
    if(!function_exists('compileCategoryDetails')){
        function compileCategoryDetails($category){
            return [
                [
                    'label' => 'Owner',
                    'result' => $category->user->full_name,
                    'icon' => 'fa-regular fa-user'
                ],
                [
                    'label' => 'Created at',
                    'result' => showDateTime($category->created_at),
                    'icon' => 'fa-regular fa-calendar'
                ],
                [
                    'label' => 'Updated at',
                    'result' => showDateTime($category->updated_at),
                    'icon' => 'fa-regular fa-calendar'
                ],
                [
                    'label' => 'ID',
                    'result' => $category->id,
                    'icon' => 'fa-solid fa-database'
                ],
                [
                    'label' => 'Hex',
                    'result' => $category->hex,
                    'icon' => 'fa-solid fa-fingerprint'
                ],
                [
                    'label' => 'Status',
                    'result' => ucfirst($category->status),
                    'icon' => 'fa-solid fa-lock'
                ],
            ];
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




    

    
