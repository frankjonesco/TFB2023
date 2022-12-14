<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['resource_type', 'resource_id', 'author_name', 'author_email', 'body'];
    

    // RELATIONSHIPS

    // Relationship to company
    public function company(){
        return $this->belongsTo(Company::class, 'company_id');
    }

    // Relationship to article
    public function article(){
        return $this->belongsTo(Article::class, 'resource_id');
    }

    // Relationship to user
    public function user(){
        return $this->belongsTo(User::class);
    }


    // RETRIEVAL METHODS

    // Get comment author image
    public function authorImage(){
        if($this->user_id){
            if($this->user->image){
                return asset('images/users/'.$this->user->hex.'/tn-'.$this->user->image);
            }
        }
        return asset('images/users/profile-pic-male.jpg');
    }

    // Get comment author image
    public function authorName(){
        if($this->user_id){
            if($this->user->first_name && $this->user->last_name){
                return $this->user->full_name;
            }
        }
        return $this->author_name;
    }
}
