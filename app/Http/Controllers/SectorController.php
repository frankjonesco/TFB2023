<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SectorController extends Controller
{
    // Show all sectors
    public function index(){
        return view('sectors.index');
    }
}
