<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Industry extends Model
{
    use HasFactory;

    // ROUTES

    // Set the route key name
    public function getRouteKeyName(){
        return 'hex';
    }



    // RELATIONSHIPS

    // Relationship to sectors
    public function sectors(){
        return $this->belongsToMany(Sector::class);
    }

    // Relationship to companies
    // public function companies(){
    //     return $this->hasMany(Company::class, 'industry_ids');
    // }
    public function companies(){
        return $this->belongsToMany(Company::class);
    }

    // Relationship to users
    public function user(){
        return $this->belongsTo(User::class, 'user_id')
            ->withDefault([
                'first_name' => 'Unknown',
                'last_name' => 'user'
            ]);
    }



    // RETRIEVAL METHODS

    // All companies
    public function allCompanies($industry_id = null){
        
        if(!$industry_id){
            $industry_id = $this->id;
        }

        $companies = Company::whereRaw('find_in_set("'.$industry_id.'", industry_ids)')->get();

        return $companies;
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
