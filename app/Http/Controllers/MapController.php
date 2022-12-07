<?php

namespace App\Http\Controllers;

use App\Models\Map;
use Illuminate\Http\Request;

class MapController extends Controller
{
    // Admin index
    public function adminIndex(){
        return view('dashboard.maps.index', [
            'maps' => Map::get()
        ]);
    }
}
