<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Company;
use App\Models\Industry;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class IndustryController extends Controller
{
    
    // Show all public industries
    public function index(Site $site){
        return view('industries.index', [
            'industries' => $site->publicIndustries()
        ]);
    }
    

    // ADMIN METHODS

    // ADMIN: Show all industries
    public function adminIndex(Site $site){
        return view('dashboard.industries.index', [
            'industries' => $site->paginateAllIndustries()
        ]);
    }

    // ADMIN: Show create form
    public function create(Site $site){
        return view('dashboard.industries.create', [
            'sectors' => $site->allSectors()
        ]);
    }

    // ADMIN: Store new industry
    public function store(Request $request, Industry $industry){

        // Validate form
        $request->validate([
            'name' => 'required',
            'sector_id' => 'required',
            'status' => 'required'
        ]);

        // Form data to model
        $industry->hex = Str::random(11);
        $industry->user_id = 1;
        $industry->sector_id = $request->sector_id;
        $industry->name = $request->name;
        $industry->slug = $request->slug;
        $industry->english_name = $request->english_name;
        $industry->english_slug = $request->english_slug;
        $industry->description = $request->description;
        $industry->status = $request->status;

        // Save changes
        $industry->saveText();

        return redirect('dashboard/industries/'.$industry->hex)->with('success', 'Industry created!');
    }

    // ADMIN: Show single industry
    public function adminShow(Industry $industry, Site $site){
        
        return view('dashboard.industries.show', [
            'industry' => $industry,
            'industries' => $site->allIndustries()
        ]);
    }

    // ADMIN: Show edit text
    public function editText(Industry $industry, Site $site){
        return view('dashboard.industries.edit-text', [
            'industry' => $industry,
            'sectors' => $site->allSectors(),
            'users' => $site->allUsers()
        ]);
    }

    // ADMIN: Update text
    public function updateText(Industry $industry, Request $request){

        // Validate form
        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);

        // Form data to model
        $industry->name = $request->name;
        $industry->slug = $request->slug;
        $industry->english_name = $request->english_name;
        $industry->english_slug = $request->english_slug;
        $industry->sector_id = $request->sector_id;
        $industry->description = $request->description;
        $industry->user_id = $request->user_id;
        $industry->status = $request->status;

        // Save changes
        $industry->saveText();

        return redirect('dashboard/industries/'.$industry->hex)->with('success', 'Industry updated!');
    }

    // ADMIN: Show edit image
    public function editImage(Industry $industry){
        return view('dashboard.industries.edit-image', [
            'industry' => $industry
        ]);
    }

    // ADMIN: Update image
    public function updateImage(Industry $industry, Request $request){

        // Validate form
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100'
        ]);

        // Upload the image, make thumbnail, update database
        if($request->hasFile('image')){
            $industry->saveImage($request);
        }
        
        return redirect('dashboard/industries/'.$industry->hex.'/image/crop')->with('success', 'Your image was uploaded. Now let\'s crop it.');
    }

    // ADMIN: Crop image
    public function cropImage(Industry $industry){
        return view('dashboard.industries.crop-image', [
            'industry' => $industry
        ]);
    }

    // ADMIN: Render image
    public function renderImage(Industry $industry, Request $request){
        $data = $request->validate([
            'x' => 'required',
            'y' => 'required',
            'w' => 'required',
            'h' => 'required'
        ]);

        $industry->saveRenderedImage($data);

        return redirect('dashboard/industries/'.$industry->hex)->with('success', 'Your image has been cropped.');
    }

    // ADMIN: Delete options
    public function deleteOptions(Industry $industry){
        return view('dashboard.industries.delete-options', [
            'industry' => $industry
        ]);
    }

    // ADMIN: Delete industry
    public function delete(Industry $industry){
        $industry->delete();
        File::deleteDirectory(public_path('images/industries/'.$industry->hex));
        return redirect('dashboard/industries')->with('success', 'Industry deleted.');
    }

    // ADMIN: With selected
    public function withSelected(Industry $industry, Request $request){
        // dd($request->companies);

        if($request->with_selected == 'change_sector'){
            $request->validate([
                'company_ids' => 'required',
                'sector' => 'required'
            ]);

            foreach($request->company_ids as $company_id){
                Company::where('id', $company_id)->update(['sector_ids' => $company_id]);
            }   

        }
    }
}
