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
    if(! function_exists('navSponsors')) {
        function navSponsors(){
            return Sponsor::where('show_in_navbar', true)->get();
        }
    }
