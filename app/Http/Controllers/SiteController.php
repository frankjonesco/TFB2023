<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home(){
        return view('home');
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
}
