<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    // Show all public articles
    public function index(Site $site){
        return view('articles.index', [
            'articles' => $site->publicArticles()
        ]);
    }
    

    // ADMIN METHODS

    // ADMIN: Show all articles
    public function adminIndex(Site $site){
        return view('dashboard.articles.index', [
            'articles' => $site->paginateAllArticles()
        ]);
    }

    // ADMIN: Show create form
    public function create(Site $site){
        return view('dashboard.articles.create', [
            'categories' => $site->allCategories()
        ]);
    }

    // ADMIN: Store new article
    public function store(Request $request, Article $article){

        // Validate form
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'status' => 'required'
        ]);

        // Form data to model
        $article->hex = Str::random(11);
        $article->user_id = 1;
        $article->category_id = $request->category_id;
        $article->title = $request->title;
        $article->slug = $request->slug;
        $article->body = $request->body;
        $article->status = $request->status;

        // Save changes
        $article->saveText();

        return redirect('dashboard/articles/'.$article->hex)->with('success', 'Article created!');
    }

    // ADMIN: Show single article
    public function adminShow(Article $article){
        return view('dashboard.articles.show', [
            'article' => $article
        ]);
    }

    // ADMIN: Show edit text
    public function editText(Article $article, Site $site){
        return view('dashboard.articles.edit-text', [
            'article' => $article,
            'categories' => $site->allCategories()
        ]);
    }

    // ADMIN: Update text
    public function updateText(Article $article, Request $request){

        // Validate form
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'status' => 'required'
        ]);

        // Form data to model
        $article->title = $request->title;
        $article->slug = $request->slug;
        $article->category_id = $request->category_id;
        $article->body = $request->body;
        $article->status = $request->status;

        // Save changes
        $article->saveText();

        return redirect('dashboard/articles/'.$article->hex)->with('success', 'Article updated!');
    }

    // ADMIN: Show edit image
    public function editImage(Article $article){
        return view('dashboard.articles.edit-image', [
            'article' => $article
        ]);
    }

    // ADMIN: Update image
    public function updateImage(Article $article, Request $request){

        // Validate form
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100'
        ]);

        // Upload the image, make thumbnail, update database
        if($request->hasFile('image')){
            $article->saveImage($request);
        }
        
        return redirect('dashboard/articles/'.$article->hex.'/image/crop')->with('success', 'Your image was uploaded. Now let\'s crop it.');
    }

    // ADMIN: Crop image
    public function cropImage(Article $article){
        return view('dashboard.articles.crop-image', [
            'article' => $article
        ]);
    }

    // ADMIN: Render image
    public function renderImage(Article $article, Request $request){
        $data = $request->validate([
            'x' => 'required',
            'y' => 'required',
            'w' => 'required',
            'h' => 'required'
        ]);

        $article->saveRenderedImage($data);

        return redirect('dashboard/articles/'.$article->hex)->with('success', 'Your image has been cropped.');
    }

    // ADMIN: Delete options
    public function deleteOptions(Article $article){
        return view('dashboard.articles.delete-options', [
            'article' => $article
        ]);
    }

    // ADMIN: Delete article
    public function delete(Article $article){
        $article->delete();
        File::deleteDirectory(public_path('images/articles/'.$article->hex));
        return redirect('dashboard/articles')->with('success', 'Article deleted.');
    }
}
