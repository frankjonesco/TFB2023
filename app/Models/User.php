<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'hex',
        'first_name',
        'last_name',
        'gender',
        'email',
        'password',
        'user_type_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    // ROUTES

    // Set the route key name
    public function getRouteKeyName(){
        return 'hex';
    }



    // RELATIONSHIPS

    // Relationship to companies
    public function companies(){
        return $this->hasMany(User::class, 'user_id');
    }

    // User's color
    public function color(){
        return $this->belongsTo(
            Color::class, 
            'color_fill_id', 
            'fill_id'
        )->where('color_theme_id', Setting::find(1)->color_theme_id);
    }

    // Relationship to articles
    public function articles(){
        return $this->hasMany(Article::class, 'user_id');
    }





    // ACCESSOR METHODS





    // Accessor for profile pic
    public function getUserTypeAttribute()
    {   
        return UserType::find($this->user_type_id)->name;
    }

    // Accessor for profile pic
    public function getFullNameAttribute()
    {   
        return ucfirst($this->first_name).' '.ucfirst($this->last_name);
    }

    // Accessor for profile pic
    public function getProfilePicAttribute()
    {   
        if($this->image){
            return asset('images/users/'.$this->hex.'/'.$this->image);
        }
        else{
            return asset('images/users/profile-pic-male.jpg');
        }
    }
}
