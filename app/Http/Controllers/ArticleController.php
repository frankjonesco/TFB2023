<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    

    // Show article index
    public function index(Site $site, Request $request){
        $show_news_header = true;
        if($request->has('page')){
            $show_news_header = false;
        }

        return view('articles.index', [
            'articles' => Article::latest()->paginate(8),
            'categories' => $site->publicCategories(),
            'show_news_header' => $show_news_header
        ]);
    }

    // Show single article
    public function show(Article $article, $slug){
        $article->views = ($article->views + 1);
        $article->save();
        
        $site = new Site();
        return view('articles.show', [
            'article' => $article,
            'companies' => $site->paginatePublicCompaniesAndRankingsLatest(12),
            'author_articles' => Article::where('user_id', $article->user_id)->where('id', '!=', $article->id)->where('status', 'public')->latest()->take(4)->get(),
            'similar_articles' => Article::where('status', 'public')->orderBy(DB::raw('RAND()'))->take(3)->get(),
            'split_articles' => Article::where('status', 'public')->orderBy(DB::raw('RAND()'))->take(2)->get()
        ]);
    }

    // Search results
    public function searchResults(Request $request, Site $site){
        // dd($request->term);
        return view('articles.search-results', [
            'term' => $request->term,
            'articles' => $site->publicArticlesSearchResults($request->term)
        ]);
    }

    // Post comment to article
    public function postComment(Request $request){
        
        $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email',
            'body' => 'required',
        ]);

        $article = Article::where('hex', $request->hex)->first();
        
        $comment = new Comment();

        $comment->resource_type = 'article';
        $comment->resource_id = $article->id;
        $comment->author_name = $request->name;
        $comment->author_email = $request->email;
        $comment->body = $request->body;
        $comment->status = 'public';

        if($comment->save()){
            $comment = Comment::find($comment->id);
            $comment['image'] = $comment->authorImage();
            session()->put('commentPosted', true);
            return json_encode($comment);
        }

        return false;
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
        $article->details = compileArticleDetails($article);

        // dd($article->details);
        return view('dashboard.articles.show', [
            'article' => $article,
            'author_articles' => Article::where('user_id', $article->user_id)->where('id', '!=', $article->id)->where('status', 'public')->take(4)->latest()->get()
        ]);
    }

    // ADMIN: Show edit text
    public function editText(Article $article, Site $site){
        $article->details = compileArticleDetails($article);
        return view('dashboard.articles.edit-text', [
            'article' => $article,
            'categories' => $site->allCategories()
        ]);
    }

    // ADMIN: Update text
    public function updateText(Article $article, Request $request){

        // Validate form
        $request->validate([
            'title' => ['required', 'max:191'],
            'tags' => ['regex:/^[A-Za-z0-9\-, ]*$/','nullable'],
            'status' => 'required'
        ]);

        // Form data to model
        $article->title = $request->title;
        $article->slug = $request->slug;
        $article->caption = $request->caption;
        $article->teaser = $request->teaser;
        $article->category_id = $request->category_id;
        $article->body = $request->body;
        $article->tags = formatTags($request->tags);
        $article->status = $request->status;

        // Save changes
        $article->saveText();

        return redirect('dashboard/articles/'.$article->hex)->with('success', 'Article updated!');
    }

    // ADMIN: Show edit image
    public function editImage(Article $article){
        $article->details = compileArticleDetails($article);
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
        $article->details = compileArticleDetails($article);
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
        $article->details = compileArticleDetails($article);
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
