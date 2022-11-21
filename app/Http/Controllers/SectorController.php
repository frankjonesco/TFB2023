<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    // Show all public sectors
    public function index(Site $site){
        return view('sectors.index', [
            'sectors' => $site->publicSectors()
        ]);
    }

    // ADMIN: Show all sectors
    public function adminIndex(Site $site){
        return view('dashboard.sectors.index', [
            'sectors' => $site->allSectors()
        ]);
    }

    // ADMIN: Show single sector
    public function adminShow(Sector $sector){
        return view('dashboard.sectors.show', [
            'sector' => $sector
        ]);
    }

    // ADMIN: Show edit text
    public function editText(Sector $sector){
        return view('dashboard.sectors.edit-text', [
            'sector' => $sector
        ]);
    }

    // ADMIN: Update text
    public function updateText(Sector $sector, Request $request){

        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);

        $sector->name = $request->name;
        $sector->slug = $request->slug;
        $sector->english_name = $request->english_name;
        $sector->english_slug = $request->english_slug;
        $sector->description = $request->description;
        $sector->status = $request->status;

        $sector->saveText();

        return redirect('dashboard/sectors/'.$sector->hex.'/text/edit')->with('success', 'Sector updated!');
    }

    // ADMIN: Show edit image
    public function editImage(Sector $sector){
        return view('dashboard.sectors.edit-image', [
            'sector' => $sector
        ]);
    }
}
