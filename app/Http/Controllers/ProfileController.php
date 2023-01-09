<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Show single profile
    public function show(){
        return view('profile.show', [
            'user' => auth()->user()
        ]);
    }
}
