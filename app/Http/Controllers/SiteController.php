<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Company;
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
