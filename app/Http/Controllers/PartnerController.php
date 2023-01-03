<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class PartnerController extends Controller
{   
    public function index(Site $site){
        
        return view('partners.index', [
            'partners' => $site->publicPartners(),
        ]);
    }
}
