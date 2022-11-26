<?php

use Illuminate\Support\Facades\Config;

    // Settings: date_format
    if (!function_exists('formatDate')){
        function showDate($date){
            $format = Config::get('date_format');
            return $date->format($format);
        }
    }
