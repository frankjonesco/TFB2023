<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Show single profile
    public function show(){
        return view('profile.show', [
            'user' => auth()->user()
        ]);
    }


    // Edit profile
    public function edit(){
        return view('profile.edit', [
            'user' => auth()->user()
        ]);
    }


    // Update profile


    // Edit image
    public function editImage(){
        return view('profile.edit-image', [
            'user' => auth()->user()
        ]);
    }


    // Update image


    // Crop image


    // Update cropped image


    // Edit settings
    public function editSettings(){
        return view('profile.edit-settings', [
            'user' => auth()->user()
        ]);
    }

    // Update settings


    // Confirm delete
    public function confirmDelete(){
        return view('profile.confirm-delete', [
            'user' => auth()->user()
        ]);
    }


    // Delete
    public function delete(User $user){

        $user = auth()->user();

        $user->delete();

        redirect('/');

        return view('profile.confirm-delete', [
            'user' => auth()->user()
        ]);
    }

}
