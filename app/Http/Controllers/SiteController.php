<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Company;
use App\Models\Message;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    // Show homepage
    public function home(){
        
        $articles['popular'] = Article::take(5)->latest()->get();
        $articles['recent'] = Article::skip(5)->take(5)->latest()->get();
        $articles['top'] = Article::skip(10)->take(5)->latest()->get();

        return view('home', [
            'articles' => $articles
        ]);

    }

    // Show about
    public function showAbout(){
        return view('about.show');
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
