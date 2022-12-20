<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\User;
use App\Models\Country;
use App\Models\UserType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{

    // Show sign up form
    public function showSignUp(){
        return view('users.signup');
    }

    // Store sign up
    public function storeSignUp(Request $request){
        
        // Validate form
        $request->validate([
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'gender' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        // Create user
        $user = User::create([
            'hex' => Str::random(11),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_type_id' => 6
        ]);

        // Log user in
        auth()->login($user);

        return redirect('/')->with('message', 'Account created & logged in!');
    }

    // Show login form 
    public function login(){
        return view('users.login');
    }

    // Authenticate for login
    public function authenticateForLogin(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
            $request->session()->regenerate();

            return redirect('/dashboard')->with('message', 'You have logged in!');
        }

        return back()->withErrors(['email' => 'Invalid credentials.'])->onlyInput('email');
    }

    // Log user out
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out.');
    }

    // ADMIN METHODS

    // ADMIN: Show all users
    public function adminIndex(Site $site){
        return view('dashboard.users.index', [
            'users' => $site->paginateAllUsers()
        ]);
    }

    // ADMIN: Show create form
    public function create(Site $site){
        return view('dashboard.users.create', [
            'user_types' => UserType::get(),
            'countries' => Country::get(),
            'colors' => $site->allColors()
        ]);
    }

    // ADMIN: Store new user
    public function store(Request $request, User $user){

        // Validate form
        $request->validate([
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'username' => ['required', 'min:4', 'regex:/([A-Za-z0-9_])+/', Rule::unique('users', 'username')],
            'password' => 'required|confirmed|min:6',
            'user_type_id' => 'required',
        ]);

        // Form data to model
        $user->hex = Str::random(11);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->description = $request->description;
        $user->user_type_id = $request->user_type_id;
        $user->phone = $request->phone;
        $user->country_iso = $request->country_iso;
        $user->color_fill_id = $request->color_fill_id;

        $user->email_verified_at = date('Y-m-d H:i:s', time());
        $user->remember_token = Str::random(10);

        // Save changes
        $user->save();

        return redirect('dashboard/users/'.$user->hex)->with('success', 'User created!');
    }

    // ADMIN: Show single category
    public function adminShow(User $user){
        return view('dashboard.users.show', [
            'user' => $user
        ]);
    }

    // ADMIN: Show edit text
    public function editText(User $user){
        return view('dashboard.users.edit-text', [
            'user' => $user
        ]);
    }

    // ADMIN: Update text
    public function updateText(User $user, Request $request){

        // Validate form
        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);

        // Form data to model
        $user->name = $request->name;
        $user->slug = $request->slug;
        $user->english_name = $request->english_name;
        $user->english_slug = $request->english_slug;
        $user->description = $request->description;
        $user->status = $request->status;

        // Save changes
        $user->saveText();

        return redirect('dashboard/users/'.$user->hex)->with('success', 'User updated!');
    }

    // ADMIN: Show edit image
    public function editImage(User $user){
        return view('dashboard.users.edit-image', [
            'user' => $user
        ]);
    }

    // ADMIN: Update image
    public function updateImage(User $user, Request $request){

        // Validate form
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100'
        ]);

        // Upload the image, make thumbnail, update database
        if($request->hasFile('image')){
            $user->saveImage($request);
        }
        
        return redirect('dashboard/users/'.$user->hex.'/image/crop')->with('success', 'Your image was uploaded. Now let\'s crop it.');
    }

    // ADMIN: Crop image
    public function cropImage(User $user){
        return view('dashboard.users.crop-image', [
            'user' => $user
        ]);
    }

    // ADMIN: Render image
    public function renderImage(User $user, Request $request){
        $data = $request->validate([
            'x' => 'required',
            'y' => 'required',
            'w' => 'required',
            'h' => 'required'
        ]);

        $user->saveRenderedImage($data);

        return redirect('dashboard/users/'.$user->hex)->with('success', 'Your image has been cropped.');
    }

    // ADMIN: Delete options
    public function deleteOptions(User $user){
        return view('dashboard.users.delete-options', [
            'user' => $user
        ]);
    }

    // ADMIN: Delete user
    public function delete(User $user){
        $user->delete();
        File::deleteDirectory(public_path('images/users/'.$user->hex));
        return redirect('dashboard/users')->with('success', 'User deleted.');
    }
}
