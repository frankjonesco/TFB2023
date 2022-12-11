<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Article extends Model
{
    use HasFactory;

    // ROUTES

    // Set the route key name
    public function getRouteKeyName(){
        return 'hex';
    }



    // RELATIONSHIPS

    // Relationship to sector
    public function sector(){
        return $this->belongsTo(Sector::class, 'sector_id');
    }

    // Relationship to category
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Relationship to users
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship to comments
    public function comments(){
        return $this->hasMany(Comment::class, 'resource_id');
    }


    // ACCESSOR METHODS


    // /**
    //  * Get the user's first name.
    //  *
    //  * @return \Illuminate\Database\Eloquent\Casts\Attribute
    //  */
    // protected function firstName(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => ucfirst($value),
    //     );
    // }



    // ACTION METHODS

    // Save text (update)
    public function saveText(){
        $this->save();
        return $this;
    }

    // Save image (update)
    public function saveImage($request){
        $site = new Site();
        $this->image = $site->handleImageUpload($request, 'articles', $this->hex);
        $this->save();
        return $this;
    }

    // Save rendered image (update)
    public function saveRenderedImage($data){
        $site = new Site();
        $this->image = $site->handleRenderedImage($data, 'articles', $this->hex, $this->image);
        return $this;
    }
}
