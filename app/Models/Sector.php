<?php

namespace App\Models;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sector extends Model
{
    use HasFactory;

    // ROUTING

    // Set the route key name
    public function getRouteKeyName(){
        return 'hex';
    }



    // RELATIONSHIPS

    // Relationship to industries
    public function industries(){
        return $this->belongsToMany(
            Industry::class,
            'maps'
        )->withPivot('id', 'hex', 'sector_id', 'industry_id', 'company_id');
    }

    // Relationship to industries (grouped)
    public function grouped_industries(){
        return $this->belongsToMany(
            Industry::class,
            'maps'
        )->distinct();
    }



    // Relationship to companies
    public function companies(){
        return $this->belongsToMany(
            Company::class,
            'maps',)
            ->withPivot('id', 'hex', 'sector_id', 'industry_id', 'company_id')
            ->with('rankings')
            ->join('rankings', 'rankings.company_id', '=', 'companies.id')
            ->where('rankings.is_latest', true)
            ->where('rankings.turnover', '>=', 250000000)
            ->where('companies.family_business', 1)
            ->where('companies.tofam_status', 'in')
            ->select('companies.*', 'rankings.id AS ranking_id') // Avoid selecting everything from the stocks table
            ->orderBy('rankings.turnover', 'DESC');
    }

    // Relationship to companies (grouped)
    public function grouped_companies(){
        return $this->belongsToMany(
            Industry::class,
            'maps'
        )->distinct();
    }

    // Relationship to categories
    public function categories(){
        return $this->hasMany(Category::class, 'sector_id');
    }

    // Relationship to articles
    public function articles(){
        return $this->hasMany(Article::class, 'sector_id');
    }

    // Relationship to users
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }


    // Paginate public companies
    public function paginatePublicCompaniesAndRankingsLatest($take = 20){
        return Company::with('rankings')
        ->join('rankings', 'rankings.company_id', '=', 'companies.id')
        ->where('rankings.is_latest', true)
        ->where('rankings.turnover', '>=', 250000000)
        ->where('companies.family_business', 1)
        ->where('companies.tofam_status', 'in')
        ->select('companies.*', 'rankings.id AS ranking_id') // Avoid selecting everything from the stocks table
        ->orderBy('rankings.turnover', 'DESC')
        ->paginate($take);
    }



    // ACTION METHODS

    // Store new sector
    public function store($data){
        $site = new Site();
        $this->hex = Str::random(11);
        $this->user_id = 1;
        $this->name = $data['name'];
        $this->slug = $site->slug($data['slug']);
        $this->english_name = $data['english_name'];
        $this->english_slug = $site->slug($data['english_slug']);
        $this->description = $data['description'];
        $this->status = $data['status'];
        $this->save();
        return $this;
    }

    // Update text (update)
    public function updateText($data){
        $site = new Site();
        $this->name = $data['name'];
        $this->slug = $site->slug($data['slug']);
        $this->english_name = $data['english_name'];
        $this->english_slug = $site->slug($data['english_slug']);
        $this->description = $data['description'];
        $this->status = $data['status'];
        $this->save();
        return $this;
    }

    // Save image (update)
    public function saveImage($request){
        $site = new Site();
        $this->image = $site->handleImageUpload($request, 'sectors', $this->hex);
        $this->save();
        return $this;
    }

    // Save rendered image (update)
    public function saveRenderedImage($data){
        $site = new Site();
        $this->image = $site->handleRenderedImage($data, 'sectors', $this->hex, $this->image);
        return $this;  
    }



    // RENDERING METHODS
    
    // Get image
    public function getImage(){
        if(!$this->image){
            return asset('images/no-image.png');
        }

        return asset('images/sectors/'.$this->hex.'/'.$this->image);
    }

    // Get image thumbnail
    public function getImageThumbnail(){
        if(!$this->image){
            return asset('images/tn-no-image.png');
        }

        return asset('images/sectors/'.$this->hex.'/tn-'.$this->image);
    }
}
