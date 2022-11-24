<?php

namespace App\Models;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sector extends Model
{
    use HasFactory;

    // ROUTING

    // Set the route key name
    public function getRouteKeyName(){
        return 'hex';
    }



    // RELATIONSHIPS

    // Relationship to industries
    public function industries(){
        return $this->hasMany(Industry::class, 'sector_id');
    }

    // Relationship to companies
    public function companies(){
        return $this->hasMany(Company::class, 'sector_ids');
    }

    // Relationship to categories
    public function categories(){
        return $this->hasMany(Category::class, 'sector_id');
    }

    // Relationship to articles
    public function articles(){
        return $this->hasMany(Article::class, 'sector_id');
    }

    // Relationship to users
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }



    // ACTION METHODS

    // Save text (update)
    public function saveText(){
        $this->save();
        return $this;
    }

    // Save image (update)
    public function saveImage($request){
        $site = new Site();
        $this->image = $site->handleImageUpload($request, 'sectors', $this->hex);
        $this->save();
        return $this;
    }

    // Save rendered image (update)
    public function saveRenderedImage($data){
        $site = new Site();
        $this->image = $site->handleRenderedImage($data, 'sectors', $this->hex, $this->image);
        return $this;  
    }
}
