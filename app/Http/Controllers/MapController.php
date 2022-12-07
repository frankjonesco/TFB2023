<?php

namespace App\Http\Controllers;

use App\Models\Map;
use App\Models\Sector;
use App\Models\Company;
use App\Models\Industry;
use Illuminate\Http\Request;

class MapController extends Controller
{
    // Admin index
    public function adminIndex(){
        return view('dashboard.maps.index', [
            'maps' => Map::get()
        ]);
    }

    // Admin sectors
    public function adminSectors(){
        return view('dashboard.maps.sectors', [
            'sectors' => Sector::get()
        ]);
    }

    // Show single map sector
    public function showSector(Sector $sector){
        return view('dashboard.maps.show-sector', [
            'sector' => $sector,
            'industries' => $sector->industries
        ]);
    }

    // Admin industries
    public function adminIndustries(){
        return view('dashboard.maps.industries', [
            'industries' => Industry::get()
        ]);
    }

    // Show single map sector
    public function showIndustry(Industry $industry){

        $industry = Industry::where('hex', $industry->hex)->with('sectors', 'companies')->first();
        return view('dashboard.maps.show-industry', [
            'industry' => $industry
        ]);
    }

    // Admin companies
    public function adminCompanies(){
        return view('dashboard.maps.companies', [
            'companies' => Company::with('sectors', 'industries')->get()
        ]);
    }
}
