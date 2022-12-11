<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;

class PartnerController extends Controller
{   
    public function index(){
        
        return view('partners.index');
    }
}
