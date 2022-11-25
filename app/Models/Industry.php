<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industry extends Model
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

    // Relationship to companies
    public function companies(){
        return $this->hasMany(Company::class, 'industry_ids');
    }

    // Relationship to users
    public function user(){
        return $this->belongsTo(User::class, 'user_id')
            ->withDefault([
                'first_name' => 'Unknown',
                'last_name' => 'user'
            ]);
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
        $this->image = $site->handleImageUpload($request, 'industries', $this->hex);
        $this->save();
        return $this;
    }

    // Save rendered image (update)
    public function saveRenderedImage($data){
        $site = new Site();
        $this->image = $site->handleRenderedImage($data, 'industries', $this->hex, $this->image);
        return $this;
    }
}
