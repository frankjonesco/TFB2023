<?php

namespace App\Models;

use Illuminate\Validation\Rules\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    // ROUTES

    // Set the route key name
    public function getRouteKeyName(){
        return 'hex';
    }



    // RELATIONSHIPS

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


    // RENDERING METHODS
    
    // Get image
    public function getImage(){
        if(!$this->image){
            return asset('images/articles/no-image.png');
        }

        return asset('images/articles/'.$this->hex.'/'.$this->image);
    }

    // Get image thumbnail
    public function getImageThumbnail(){
        if(!$this->image){
            return asset('images/articles/tn-no-image.png');
        }

        return asset('images/articles/'.$this->hex.'/tn-'.$this->image);
    }

    // Split tags (into Array)
    public function splitTags(){
        return explode(',', $this->tags);
    }

    // Render tags (string with links)
    public function renderTags(){
        $tags = explode(',', $this->tags);
        foreach($tags as $tag){
            $tag_links[] = '<a href="/tags/'.$tag.'">'.$tag.'</a>';
        }
        return implode(', ', $tag_links);
    }
}
