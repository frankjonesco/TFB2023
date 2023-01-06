<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    // Show all public categories
    public function index(Site $site){
        return view('categories.index', [
            'categories' => $site->publicCategories()
        ]);
    }

    // Show sing category
    public function show(Category $category, Site $site){
        return view('categories.show', [
            'category' => $category,
            'current_category' => $category->id,
            'categories' => $site->publicCategories(),
            'articles' => $category->articles
        ]);
    }
    

    // ADMIN METHODS

    // ADMIN: Show all categories
    public function adminIndex(Site $site){
        return view('dashboard.categories.index', [
            'categories' => $site->paginateAllCategories()
        ]);
    }

    // ADMIN: Show create form
    public function create(){
        return view('dashboard.categories.create');
    }

    // ADMIN: Store new category
    public function store(Request $request, Category $category){

        // Validate form
        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);

        // Form data to model
        $category->hex = Str::random(11);
        $category->user_id = 1;
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->english_name = $request->english_name;
        $category->english_slug = $request->english_slug;
        $category->description = $request->description;
        $category->status = $request->status;

        // Save changes
        $category->saveText();

        return redirect('dashboard/categories/'.$category->hex)->with('success', 'Category created!');
    }

    // ADMIN: Show single category
    public function adminShow(Category $category){
        return view('dashboard.categories.show', [
            'category' => $category
        ]);
    }

    // ADMIN: Show edit text
    public function editText(Category $category){
        $category->details = compileCategoryDetails($category);
        return view('dashboard.categories.edit-text', [
            'category' => $category
        ]);
    }

    // ADMIN: Update text
    public function updateText(Category $category, Request $request){

        // Validate form
        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);

        // Form data to model
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->english_name = $request->english_name;
        $category->english_slug = $request->english_slug;
        $category->description = $request->description;
        $category->status = $request->status;

        // Save changes
        $category->saveText();

        return redirect('dashboard/categories/'.$category->hex)->with('success', 'Category updated!');
    }

    // ADMIN: Show edit image
    public function editImage(Category $category){
        $category->details = compileCategoryDetails($category);
        return view('dashboard.categories.edit-image', [
            'category' => $category
        ]);
    }

    // ADMIN: Update image
    public function updateImage(Category $category, Request $request){

        // Validate form
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100'
        ]);

        // Upload the image, make thumbnail, update database
        if($request->hasFile('image')){
            $category->saveImage($request);
        }
        
        return redirect('dashboard/categories/'.$category->hex.'/image/crop')->with('success', 'Your image was uploaded. Now let\'s crop it.');
    }

    // ADMIN: Crop image
    public function cropImage(Category $category){
        $category->details = compileCategoryDetails($category);
        return view('dashboard.categories.crop-image', [
            'category' => $category
        ]);
    }

    // ADMIN: Render image
    public function renderImage(Category $category, Request $request){
        $data = $request->validate([
            'x' => 'required',
            'y' => 'required',
            'w' => 'required',
            'h' => 'required'
        ]);

        $category->saveRenderedImage($data);

        return redirect('dashboard/categories/'.$category->hex)->with('success', 'Your image has been cropped.');
    }

    // ADMIN: Delete options
    public function deleteOptions(Category $category){
        $category->details = compileCategoryDetails($category);
        return view('dashboard.categories.delete-options', [
            'category' => $category
        ]);
    }

    // ADMIN: Delete category
    public function delete(Category $category){
        $category->delete();
        File::deleteDirectory(public_path('images/categories/'.$category->hex));
        return redirect('dashboard/categories')->with('success', 'Category deleted.');
    }
}
