<?php

namespace App\Models;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    // ROUTING

    // Set the route key name
    public function getRouteKeyName(){
        return 'hex';
    }



    // RELATIONSHIPS

    // Relationship to articles
    public function articles(){
        return $this->hasMany(Article::class, 'category_id');
    }

    // Relationship to articles
    public function public_articles(){
        return $this->hasMany(Article::class, 'category_id')->where('status', 'public');
    }


    // Relationship to users
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship to sector
    public function sector(){
        return $this->belongsTo(Sector::class, 'sector_id');
    }

    // Relationship to color
    public function color(){
        return $this->belongsTo(
            Color::class, 
            'color_fill_id', 
            'fill_id'
        )->where('color_theme_id', Config::get(['color_theme_id']));
    }



    // FETCH METHODS

    // Public Link
    public function link(){
        return url('news/categories/'.$this->hex.'/'.$this->slug);
    }

    


    // RENDERING METHODS

    // Get image
    public function getImage(){
        if(!$this->image){
            return asset('images/no-image.png');
        }
        elseif(file_exists(public_path('images/categories/'.$this->hex.'/'.$this->image))){
            return asset('images/categories/'.$this->hex.'/'.$this->image);
        }
        return asset('images/no-image.png');
        
    }

    // Get image thumbnail
    public function getImageThumbnail(){
        if(!$this->image){
            return asset('images/tn-no-image.png');
        }
        elseif(file_exists(public_path('images/categories/'.$this->hex.'/tn-'.$this->image))){
            return asset('images/categories/'.$this->hex.'/tn-'.$this->image);
        }
        return asset('images/tn-no-image.png');
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
        $this->image = $site->handleImageUpload($request, 'categories', $this->hex);
        $this->save();
        return $this;
    }

    // Save rendered image (update)
    public function saveRenderedImage($data){
        $site = new Site();
        $this->image = $site->handleRenderedImage($data, 'categories', $this->hex, $this->image);
        return $this;
    }
}
