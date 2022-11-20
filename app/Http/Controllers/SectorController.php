<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    // Show all public sectors
    public function index(Site $site){
        return view('sectors.index', [
            'sectors' => $site->publicSectors()
        ]);
    }

    // Show all public sectors
    public function adminIndex(Site $site){
        return view('dashboard.sectors.index', [
            'sectors' => $site->allSectors()
        ]);
    }
}
