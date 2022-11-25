<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Company;
use App\Models\Industry;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    // Show all public companies
    public function index(Site $site){
        return view('companies.index', [
            'companies' => $site->publicCompanies()
        ]);
    }
    

    // ADMIN METHODS

    // ADMIN: Show all companies
    public function adminIndex(Site $site){
        return view('dashboard.companies.index', [
            'companies' => $site->paginateAllCompanies()
        ]);
    }

    // ADMIN: Show create form
    public function create(Site $site){
        return view('dashboard.companies.create');
    }

    // ADMIN: Store new sector
    public function store(Request $request, Company $company){

        // Validate form
        $request->validate([
            'registered_name' => 'required',
            'status' => 'required'
        ]);

        // Form data to model
        $company->hex = Str::random(11);
        $company->user_id = 1;
        $company->registered_name = $request->registered_name;
        $company->trading_name = $request->trading_name;
        $company->slug = $request->slug;
        $company->description = $request->description;
        $company->status = $request->status;

        // Save changes
        $company->saveText();

        return redirect('dashboard/companies/'.$company->hex)->with('success', 'Company created!');
    }

    // ADMIN: Show single company
    public function adminShow(Company $company){
        return view('dashboard.companies.show', [
            'company' => $company
        ]);
    }

    // ADMIN: Show edit text
    public function editText(Company $company, Site $site){
        return view('dashboard.companies.edit-text', [
            'company' => $company
        ]);
    }

    // ADMIN: Update text
    public function updateText(Company $company, Request $request){
        
        // Validate form
        $request->validate([
            'registered_name' => 'required',
            'status' => 'required'
        ]);

        // Form data to model
        $company->registered_name = $request->registered_name;
        $company->trading_name = $request->trading_name;
        $company->slug = $request->slug;
        $company->description = $request->description;
        $company->status = $request->status;

        // Save changes
        $company->saveText();

        return redirect('dashboard/companies/'.$company->hex)->with('success', 'Company updated!');
    }

    // ADMIN: Show edit image
    public function editImage(Company $company){
        return view('dashboard.companies.edit-image', [
            'company' => $company
        ]);
    }

    // ADMIN: Update image
    public function updateImage(Company $company, Request $request){

        // Validate form
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100'
        ]);

        // Upload the image, make thumbnail, update database
        if($request->hasFile('image')){
            $company->saveImage($request);
        }
        
        return redirect('dashboard/companies/'.$company->hex.'/image/crop')->with('success', 'Your image was uploaded. Now let\'s crop it.');
    }

    // ADMIN: Crop image
    public function cropImage(Company $company){
        return view('dashboard.companies.crop-image', [
            'company' => $company
        ]);
    }

    // ADMIN: Render image
    public function renderImage(Company $company, Request $request){
        $data = $request->validate([
            'x' => 'required',
            'y' => 'required',
            'w' => 'required',
            'h' => 'required'
        ]);

        $company->saveRenderedImage($data);

        return redirect('dashboard/companies/'.$company->hex)->with('success', 'Your image has been cropped.');
    }

    // ADMIN: Delete options
    public function deleteOptions(Company $company){
        return view('dashboard.companies.delete-options', [
            'company' => $company
        ]);
    }

    // ADMIN: Delete company
    public function delete(Company $company){
        $company->delete();
        File::deleteDirectory(public_path('images/companies/'.$company->hex));
        return redirect('dashboard/companies')->with('success', 'Company deleted.');
    }
}
