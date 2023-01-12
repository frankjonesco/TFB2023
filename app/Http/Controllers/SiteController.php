<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Company;
use App\Models\Message;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    // Show homepage
    public function home(Site $site){

       

        $slide_table_articles['first'] = Article::latest()->skip(17)->take(4)->get();
        $slide_table_articles['second'] = Article::latest()->skip(21)->take(4)->get();
        $slide_table_articles['third'] = Article::latest()->skip(25)->take(4)->get();

        return view('home', [
            'leading_articles' => Article::latest()->take(3)->get(),
            'latest_articles' => Article::latest()->skip(3)->take(6)->get(),
            'highlighted_feature_articles' => Article::latest()->skip(9)->take(2)->get(),
            'featured_articles' => Article::latest()->skip(11)->take(6)->get(),
            'grid_articles' => Article::latest()->skip(29)->take(6)->get(),
            'slide_table_articles' => $slide_table_articles,
            'list_articles' => Article::latest()->skip(35)->paginate(8),
            'comments' => Comment::where('resource_type', 'article')->latest()->take(6)->get(),
            'companies' => $site->paginatePublicCompaniesAndRankingsLatest(15),
            'search_term' => null,
            'search_year' => null,
            'search_order_by' => null,
            'search_sort_direction' => null
        ]);
    }

    

    // Show about
    public function showAbout(){
        $article = Article::find(137);
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

    // Show contact
    public function showContact(){
        return view('contact.show');
    }

    // Contact send message
    public function contactSendMessage(Request $request){
        $request->validate([
            'first_name' => 'required|min:2:max:20',
            'last_name' => 'required|min:2:max:20',
            'email' => 'required|email|max:191',
            'message' => 'required'
        ]);

        Message::create([
            'hex' => Str::random(11), 
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Your message has been sent!');
    }

    // Save subscriber
    public function saveSubscriber(Request $request){

        if(DB::table('subscribers')->where('email', $request->email)->count() > 0){
            if($request->no_refresh){
                return json_encode('fail');
            }
            return back()->with('success', 'Your email is already in our mailing list.');
        }

        $request->validate([
            'email' => 'required|email|min:4|max:191',
        ]);

        DB::table('subscribers')->insert([
            'email' => $request->email,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ]);
        if($request->no_refresh){
            return json_encode('success');
        }
        return back()->with('success', 'Your email has been save to our mailing list!');
    }

    // Show blog
    public function showBlog(){
        return view('blog.index');
    }

    // Show forum
    public function showForum(){
        return view('forum.index');
    }

    // Show terms
    public function showTerms(){
        return view('terms.show');
    }

    // Show privacy
    public function showPrivacy(){
        return view('privacy.show');
    }


    // SANDBOX
    // public function showSandbox(Company $company){
    //     $company->rankings = $company->rankings()->orderBy('year', 'DESC')->get();
    //     return view('sandbox.show', [
    //         'company' => $company
    //     ]);
    // }
}   
