<?php

namespace App\Http\Controllers;

use App\Models\Map;
use App\Models\Site;
use App\Models\User;
use App\Models\Sector;
use App\Models\Company;
use App\Models\Industry;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SectorController extends Controller
{
    // Show all public sectors
    public function index(Site $site){
        return view('sectors.index', [
            'sectors' => $site->paginatePublicSectors(),
            'term' => null
        ]);
    }

    // Show single sector
    public function show(Sector $sector){
        return view('sectors.show', [
            'sector' => $sector,
            'current_sector' => $sector->id,
            'companies' => $sector->grouped_companies()->paginate(15),
            'term' => null
        ]);
    }

    // Search results
    public function searchResults(Request $request, Site $site){
        // dd($request->term);
        return view('sectors.search-results', [
            'term' => $request->term,
            'sectors' => $site->publicSectorsSearchResults($request->term)
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
        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);
        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'english_name' => $request->english_name,
            'english_slug' => $request->english_slug,
            'description' => $request->description,
            'status' => $request->status
        ];
        $sector->store($data);
        return redirect('dashboard/sectors/'.$sector->hex)->with('success', 'Sector created.');
    }


    // ADMIN: Show single sector
    public function adminShow(Sector $sector, Site $site){

        // dd($sector->industries->groupBy('id')->first()[]);

        // dd($sector->industries->groupBy('id'));

        return view('dashboard.sectors.show', [
            'sector' => $sector,
            'industries' => $sector->industries->groupBy('id'),
            'sectors' => $site->allSectors(),
            'users' => $site->allAdminUsers()
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
        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'english_name' => $request->english_name,
            'english_slug' => $request->english_slug,
            'description' => $request->description,
            'status' => $request->status
        ];
        $sector->updateText($data);
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
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100'
        ]);
        if($request->hasFile('image')){
            $sector->saveImage($request);
        }
        return redirect('dashboard/sectors/'.$sector->hex.'/image/crop')->with('success', 'Image uploaded. Now let\'s crop it.');
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


        // Validate form
        $request->validate([
            'industry_name' => ['required', Rule::unique('industries', 'name')],
        ]);

        
        // Data to model
        $industry = new Industry();
        $industry->hex = Str::random(11);
        $industry->user_id = auth()->user()->id;
        $industry->name = $request->industry_name;
        $industry->slug = $site->slug($request->industry_name);
        $industry->english_name = $request->industry_name;
        $industry->english_slug = $site->slug($request->industry_name);
        $industry->status = 'public';
        $industry->save();

        // Add map
        $industry->addMap($sector->id, $industry->id);
        
        return redirect('dashboard/sectors/'.$sector->hex)->with('success', 'New industry created.');
    }


    // ADMIN: With selected
    public function withSelected(Sector $sector, Request $request, Site $site){
        
        // Change sector
        if($request->with_selected == 'change_sector'){
            // Validate form
            $request->validate([
                'industry_ids' => 'required',
                'sector_id' => 'required'
            ]);

            // Industry IDs to array
            $industry_ids = explode(',', $request->industry_ids);
            
            foreach($industry_ids as $industry_id){
                // Update maps    
                Map::where([
                        'sector_id' => $request->current_sector_id,
                        'industry_id' => $industry_id
                    ])
                    ->update([
                        'sector_id' => $request->sector_id
                    ]
                );
            }

            $destination_sector_name = Sector::find($request->sector_id)->name;
            return redirect('dashboard/sectors/'.$sector->hex)->with('success', 'The selected industries were moved to the '.$destination_sector_name.' sector.');
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
            $request->validate([
                'industry_ids' => 'required',
            ]);
            // Get industries
            $need_confirmation = false;
            $industry_ids = explode(',', $request->industry_ids);
            foreach($industry_ids as $industry_id){

                $industry = Industry::find($industry_id);

                $companies = $industry->companies;


                
                if($companies->isEmpty()){
                    $industry->delete();
                    File::deleteDirectory(public_path('images/industries/'.$industry->hex));
                    return redirect('dashboard/sectors/'.$sector->hex)->with('success', 'The selected sectors were deleted.');
                    
                }
                else{
                    $need_confirmation = true;                    
                }
            }

            if($need_confirmation){
                return redirect('dashboard/sectors/'.$sector->hex.'/industries/confirm-delete')->with('ids_to_delete', $request->industry_ids);
            }

            
        }
    }


    public function confirmDeleteIndustry(Sector $sector, Site $site){
        // Confirm delete industry
        // dd(session('ids_to_delete'));
        if(session()->has('ids_to_delete')){
            $industry_ids = explode(',', session('ids_to_delete'));
            session(['ids_to_delete2' => session('ids_to_delete')]);
        }else{
            $industry_ids = explode(',', session('ids_to_delete2'));
            session(['ids_to_delete' => session('ids_to_delete2')]);
        }
        $count = 0;
        foreach($industry_ids as $key => $industry_id){
            $industry = Industry::find($industry_id);
            $count += $industry->companies->count();
            $industries_to_delete[$key] = Industry::find($industry_id);
        }

        return view('dashboard.sectors.confirm-delete-industry', [
            'ids_to_delete' => $industry_ids,
            'sector' => $sector,
            'companies_count' => $count,
            'sectors' => $site->allSectors(),
            'industries' => $site->allIndustries(),
            'industries_to_delete' => $industries_to_delete,
            'industry_ids_to_delete' => session('ids_to_delete')
        ]);
    }


    // Delete industry
    public function deleteIndustry(Sector $sector, Request $request, Site $site){
        // dd(session('ids_to_delete2'));
        // dd($request);

        if(session()->has('ids_to_delete')){
            $industry_ids = explode(',', session('ids_to_delete'));
            session(['ids_to_delete2' => session('ids_to_delete')]);
        }else{
            $industry_ids = explode(',', session('ids_to_delete2'));
            session(['ids_to_delete' => session('ids_to_delete2')]);
        }

        $request->validate([
            'delete_action' => 'required'
        ]);

        
        if($request->delete_action == 'move_companies'){
            
            $request->validate([
                'sector_id' => 'required',  
                'move_to_industry_id' => 'required',
                'industries_to_delete' => 'required'
            ]);
            
            // dd($request->industries_to_delete);
            
            $industry_ids = explode(',', $request->industries_to_delete);
            
            $companies_count = 0;
            
            foreach($industry_ids as $industry_id){
                $industry = Industry::find($industry_id);

                // Update maps    
                Map::where([
                    'sector_id' => $request->current_sector_id,
                    'industry_id' => $industry->id
                ])
                ->update([
                    'sector_id' => $request->sector_id,
                    'industry_id' => $request->move_to_industry_id
                ]
            );

            }

            return redirect('dashboard/sectors')->with('success', 'Good');
            
            
        }

        if($request->delete_action == 'delete_companies'){
            dd('Delete the companies');
        }

        if($request->delete_action == 'move_companies_to_new_industry'){
            $request->validate([
                'sector_id' => 'required',
                'industry_name' => 'required'
            ]);
            
            dd('Move the companies to a new industry');
        }

        
    }
    
}
