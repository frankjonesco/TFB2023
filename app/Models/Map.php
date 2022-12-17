<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{

    protected $fillable = ['id', 'hex', 'sector_id', 'industry_id', 'company_id'];

    public $timestamps = false;

    use HasFactory;

    // ROUTES

    // Set the route key name
    public function getRouteKeyName(){
        return 'hex';
    }

    // Relationship to sector
    public function sector(){
        return $this->hasOneThrough(Sector::class, Map::class, 'id', 'id', 'sector_id', 'id');
    }

    // // Relationship to industry
    // public function industry(){
    //     return $this->belongsToMany(Industry::class, 'maps', 'id')->withPivot('id', 'hex', 'sector_id', 'industry_id', 'company_id');
    // }

    // Relationship to industry
    public function industry(){
        return $this->hasOneThrough(Industry::class, Map::class, 'id', 'id', 'industry_id', 'id');
    }

    // Relationship to companies
    public function companies(){
        return $this->belongsToMany(Company::class, 'maps', 'id')->withPivot('id', 'hex', 'sector_id', 'industry_id', 'company_id');
    }

    public function sector_industry_companies(){
        return $this->belongsToMany(
            Company::class, 
            'maps', 
            'sector_id', 
            'company_id', 
            'sector_id'
        )->withPivot('id', 'hex', 'sector_id', 'industry_id', 'company_id')
        ->wherePivot('industry_id', $this->industry_id);
    }

}

