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

    // Relationship to public comments
    public function publicComments(){
        return $this->hasMany(Comment::class, 'resource_id')->where('status', 'public');
    }

    // Relationship to associated companies
    public function associated_companies(){
        return $this->belongsToMany(
            Company::class,
            'associations'
        );
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



    // HELPER METHODS

    // Status in color
    public function statusInColor(){
        switch($this->status){
            case 'public':
                $color = 'text-green-300';
                $icon = 'fa-eye';
                break;
            case 'private':
                $color = 'text-red-300';
                $icon = 'fa-eye-slash';
                break;
            case 'unlisted':
                $color = 'text-blue-300';
                $icon = 'fa-eye';
                break;
            default:
                $color = 'text-white';
        }

        $span = '<span class="'.$color.'"><i class="fa-regular '.$icon.' mr-3 text-lg"></i>'.ucfirst($this->status).'</span>';
        return $span;
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
            return asset('images/no-image.png');
        }

        return asset('images/articles/'.$this->hex.'/'.$this->image);
    }

    // Get image thumbnail
    public function getImageThumbnail(){
        if(!$this->image){
            return asset('images/tn-no-image.png');
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
