<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
        return $this->belongsToMany(
            Sector::class, 
            'maps'
        );
    }

    // Relationship to sectors (grouped)
    public function grouped_sectors(){
        return $this->belongsToMany(
            Sector::class,
            'maps'
        )->distinct();
    }

    // Relationship to industry sectors
    public function industry_sectors(){
        return $this->belongsToMany(
            Sector::class,
            'maps'
        )->wherePivot('industry_id', 12);
    }

    // Relationship to companies with pivot (ungrouped)
    public function companies(){
        return $this->belongsToMany(
            Company::class,
            'maps'
        )->withPivot('id', 'hex', 'sector_id', 'industry_id', 'company_id');
    }
    
    // Relationship to companies (grouped)
    public function grouped_companies(){
        return $this->belongsToMany(
            Company::class,
            'maps'
        )->distinct();
    }    

    // Relationship to users
    public function user(){
        return $this->belongsTo(User::class, 'user_id')
            ->withDefault([
                'first_name' => 'Unknown',
                'last_name' => 'user'
            ]);
    }



    // ACCESSORS

    /**
    * Set which column to use for the 'name' attribute.
    *
    * @return \Illuminate\Database\Eloquent\Casts\Attribute
    */

    



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

    // Add map (insert)
    public function addMap($sector_id, $industry_id){
        Map::insert([
            'hex' => Str::random(11),
            'sector_id' => $sector_id,
            'industry_id' => $industry_id
        ]);

        return true;
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


    // RENDERING METHODS
    
    // Get image
    public function getImage(){
        if(!$this->image){
            return asset('images/no-image.png');
        }

        return asset('images/industries/'.$this->hex.'/'.$this->image);
    }

    // Get image thumbnail
    public function getImageThumbnail(){
        if(!$this->image){
            return asset('images/tn-no-image.png');
        }

        return asset('images/industries/'.$this->hex.'/tn-'.$this->image);
    }
}
