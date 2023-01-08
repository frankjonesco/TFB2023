<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Article;
use App\Models\Company;
use App\Models\Industry;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    // Show all public companies
    public function index(Site $site){

        $slide_table_articles['first'] = Article::latest()->skip(3)->take(4)->get();
        $slide_table_articles['second'] = Article::latest()->skip(7)->take(4)->get();

        return view('companies.index', [
            // 'companies' => $site->paginatePublicCompanies()
            'companies' => $site->paginatePublicCompaniesAndRankingsLatest(),
            'search_term' => null,
            'search_year' => null,
            'search_order_by' => null,
            'search_sort_direction' => null,
            'articles' => Article::where('status', 'public')->take(3)->latest()->get(),
            'slide_table_articles' => $slide_table_articles
        ]);
    }

    // Show single company
    public function show(Company $company){
        $company->views = ($company->views + 1);
        $company->save();
        $company->rankings = $company->rankings()->orderBy('year', 'DESC')->get();
        return view('companies.show', [
            'company' => $company
        ]);
    }

    // Search results
    public function searchResults(Request $request){

        $search_term = $request->search_term;
        $search_year = $request->search_year;
        $search_order_by = $request->search_order_by;
        $search_sort_direction = $request->search_sort_direction;

        if($search_year === 'all'){
            $search_year = rankingYears();
        }

        $companies = Company::with('rankings')
            ->join('rankings', 'rankings.company_id', '=', 'companies.id')
            ->where('rankings.is_latest', true)
            ->where('rankings.turnover', '>=', 250000000)
            ->where('rankings.year', $search_year)
            ->where('companies.family_business', 1)
            ->where('companies.tofam_status', 'in')
            ->where('registered_name', 'like', '%'.$search_term.'%')
            ->select('companies.*', 'rankings.id AS ranking_id') // Avoid selecting everything from the stocks table
            ->orderBy($search_order_by, $search_sort_direction)
            ->paginate(20);

        
        return view('companies.search-results', [
            'companies' => $companies, 
            'search_term' => $search_term,
            'search_year' => $search_year,
            'search_order_by' => $search_order_by,
            'search_sort_direction' => $search_sort_direction,
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
        $company->details = compileCompanyDetails($company);
        return view('dashboard.companies.show', [
            'company' => $company
        ]);
    }

    // ADMIN: Show edit text
    public function editText(Company $company, Site $site){
        $company->details = compileCompanyDetails($company);
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
        $company->details = compileCompanyDetails($company);
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
        $company->details = compileCompanyDetails($company);
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
