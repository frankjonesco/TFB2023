<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
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
        return $this->belongsToMany(Industry::class, 'sector_id');
    }

    // Relationship to industries
    public function industries(){
        return $this->belongsToMany(Industry::class);
    }

    // Relationship to contacts
    public function contacts(){
        return $this->hasMany(Contact::class, 'company_id');
    }

    // Relationship to comments
    public function comments(){
        return $this->hasMany(Comment::class, 'resource_id');
    }

    // Relationship to user
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }



    // ACCESSOR METHODS

    // Accessor for sectors
    public function getSectorsAttribute($value)
    {   
        $sector_ids = explode(',', Company::find($this->id)->sector_ids);
       
        $sectors = [];

        if(count($sector_ids) > 1){
            $sectors = Sector::whereIn('id', $sector_ids)->get();
        }
        elseif(count($sector_ids) == 1){
            $sectors = Sector::find($sector_ids);
        }

        return $sectors;
    }

    // Accessor for industries
    public function getIndustryRowsAttribute($value)
    {   
        $industry_ids = explode(',', Company::find($this->id)->industry_ids);
        $industries = [];

        if(count($industry_ids) > 1){
            $industries = Industry::whereIn('id', $industry_ids)->get();
        }
        elseif(count($industry_ids) == 1){
            $industries = Industry::find($industry_ids);
        }

        return $industries;
    }



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
        $this->image = $site->handleImageUpload($request, 'companies', $this->hex);
        $this->save();
        return $this;
    }

    // Save rendered image (update)
    public function saveRenderedImage($data){
        $site = new Site();
        $this->image = $site->handleRenderedImage($data, 'companies', $this->hex, $this->image);
        return $this;
        
    }
}
