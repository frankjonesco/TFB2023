<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\User;
use App\Models\Sector;
use App\Models\Company;
use App\Models\Industry;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
            'sectors' => $site->paginateAllSectors(),
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
    public function adminShow(Sector $sector, Site $site){
        return view('dashboard.sectors.show', [
            'sector' => $sector,
            'sectors' => $site->allSectors(),
            'users' => $site->allUsers()
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
        File::deleteDirectory(public_path('images/sectors/'.$sector->hex));
        return redirect('dashboard/sectors')->with('success', 'Sector deleted.');
    }




    // ADMIN: Store industry
    public function storeIndustry(Sector $sector, Request $request, Site $site){
        $request->validate([
            'industry_name' => 'required'
        ]);

        $industry = new Industry();

        $industry->hex = Str::random(11);
        $industry->user_id = 1;
        $industry->sector_id = $sector->id;
        $industry->name = $request->industry_name;
        $industry->slug = Str::slug($site->prepSlug($request->industry_name));
        $industry->english_name = $request->industry_name;
        $industry->english_slug = Str::slug($site->prepSlug($request->industry_name));
        $industry->status = 'public';

        $industry->save();

        return redirect('dashboard/sectors/'.$sector->hex)->with('success', 'New industry created.');
    }

    // ADMIN: With selected
    public function withSelected(Sector $sector, Request $request){
        
        // Change sector
        if($request->with_selected == 'change_sector'){
            $request->validate([
                'industry_ids' => 'required',
                'sector_id' => 'required'
            ]);
            $industry_ids = explode(',', $request->industry_ids);
            foreach($industry_ids as $industry_id){
                Industry::where('id', $industry_id)->update(['sector_id' => $request->sector_id]);
            }
            return redirect('dashboard/sectors/'.$sector->hex)->with('success', 'The selected industries were moved to the '.$sector->name.' sector.');
        }

        // Change owner
        if($request->with_selected == 'change_owner'){
            $request->validate([
                'industry_ids' => 'required',
                'user_id' => 'required'
            ]);
            $industry_ids = explode(',', $request->industry_ids);
            foreach($industry_ids as $industry_id){
                Industry::where('id', $industry_id)->update(['user_id' => $request->user_id]);
            }
            $user = User::find($request->user_id);
            return redirect('dashboard/sectors/'.$sector->hex)->with('success', $user->full_name.' was made the owner of the selected industries.');
        }

        // Delete
        if($request->with_selected == 'delete'){
            // Get industries
            $industries = Industry::whereIn('id', explode(',', $request->industry_ids))->get();
            foreach($industries as $industry){
                // Check if the are any companies in this industry
                $companies = Company::where('industry_ids', 'like', '%'.$industry->id.'%')->get();
                dd($industry->id);
                if(count($companies) > 0){
                    dd('There are companies.');
                }
                else{
                    dd('No companies.');
                }
            }
            dd($industries);
        }
    }
}
