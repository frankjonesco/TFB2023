<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Sector;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    // Show all public sectors
    public function index(Site $site){
        return view('sectors.index', [
            'sectors' => $site->publicSectors()
        ]);
    }
    

    // ADMIN METHODS

    // ADMIN: Show all sectors
    public function adminIndex(Site $site){
        return view('dashboard.sectors.index', [
            'sectors' => $site->allSectors()
        ]);
    }

    // ADMIN: Show create form
    public function create(){
        return view('dashboard.sectors.create');
    }

    // ADMIN: Store new sector
    public function store(Request $request, Sector $sector){

        // Validate form
        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);

        // Form data to model
        $sector->hex = Str::random(11);
        $sector->user_id = 1;
        $sector->name = $request->name;
        $sector->slug = $request->slug;
        $sector->english_name = $request->english_name;
        $sector->english_slug = $request->english_slug;
        $sector->description = $request->description;
        $sector->status = $request->status;

        // Save changes
        $sector->saveText();

        return redirect('dashboard/sectors/'.$sector->hex)->with('success', 'Sector created!');
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

        // Validate form
        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);

        // Form data to model
        $sector->name = $request->name;
        $sector->slug = $request->slug;
        $sector->english_name = $request->english_name;
        $sector->english_slug = $request->english_slug;
        $sector->description = $request->description;
        $sector->status = $request->status;

        // Save changes
        $sector->saveText();

        return redirect('dashboard/sectors/'.$sector->hex)->with('success', 'Sector updated!');
    }

    // ADMIN: Show edit image
    public function editImage(Sector $sector){
        return view('dashboard.sectors.edit-image', [
            'sector' => $sector
        ]);
    }

    // ADMIN: Update image
    public function updateImage(Sector $sector, Request $request){

        // Validate form
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100'
        ]);

        // Upload the image, make thumbnail, update database
        if($request->hasFile('image')){
            $sector->saveImage($request);
        }
        
        return redirect('dashboard/sectors/'.$sector->hex.'/image/crop')->with('success', 'Your image was uploaded. Now let\'s crop it.');
    }

    // ADMIN: Crop image
    public function cropImage(Sector $sector){
        return view('dashboard.sectors.crop-image', [
            'sector' => $sector
        ]);
    }

    // ADMIN: Render image
    public function renderImage(Sector $sector, Request $request){
        $data = $request->validate([
            'x' => 'required',
            'y' => 'required',
            'w' => 'required',
            'h' => 'required'
        ]);

        $sector->saveRenderedImage($data);

        return redirect('dashboard/sectors/'.$sector->hex)->with('success', 'Your image has been cropped.');
    }

    // ADMIN: Delete options
    public function deleteOptions(Sector $sector){
        return view('dashboard.sectors.delete-options', [
            'sector' => $sector
        ]);
    }

    // ADMIN: Delete sector
    public function delete(Sector $sector){
        $sector->delete();
        return redirect('dashboard/sectors')->with('success', 'Sector deleted.');
    }
}
