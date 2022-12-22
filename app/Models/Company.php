<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        return $this->belongsToMany(
            Sector::class,
            'maps',
        );
    }

    // Relationship to sectors (grouped)
    public function grouped_sectors(){
        return $this->belongsToMany(
            Sector::class,
            'maps',
        )->distinct();
    }

    // Relationship to industry sectors
    public function industry_sectors(){
        return $this->belongsToMany(
            Sector::class,
            'maps',
        )->wherePivot('industry_id', $this->pivot->industry_id);
    }

    // Relationship to industries
    public function industries(){
        return $this->belongsToMany(
            Industry::class,
            'maps',
        );
    }

    // Relationship to industries (grouped)
    public function grouped_industries(){
        return $this->belongsToMany(
            Industry::class,
            'maps',
        )->distinct();
    }

    // Relationship to industry sectors
    public function sector_industries(){
        return $this->belongsToMany(
            Industry::class,
            'maps',
        )->distinct();
    }

    // Relationship to rankings
    public function rankings(){
        return $this->hasMany(Ranking::class, 'company_id');
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

    /**
     * Get the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function showName(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes['trading_name'] ?: $attributes['registered_name']
        );
    }

    /**
     * Get the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function ranking(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => Ranking::find($this->ranking_id)
        );
    }

    

    // // Accessor for sectors
    // public function getSectorsAttribute($value)
    // {   
    //     $sector_ids = explode(',', Company::find($this->id)->sector_ids);
       
    //     $sectors = [];

    //     if(count($sector_ids) > 1){
    //         $sectors = Sector::whereIn('id', $sector_ids)->get();
    //     }
    //     elseif(count($sector_ids) == 1){
    //         $sectors = Sector::find($sector_ids);
    //     }

    //     return $sectors;
    // }

    // // Accessor for industries
    // public function getIndustryRowsAttribute($value)
    // {   
    //     $industry_ids = explode(',', Company::find($this->id)->industry_ids);
    //     $industries = [];

    //     if(count($industry_ids) > 1){
    //         $industries = Industry::whereIn('id', $industry_ids)->get();
    //     }
    //     elseif(count($industry_ids) == 1){
    //         $industries = Industry::find($industry_ids);
    //     }

    //     return $industries;
    // }



    // HELPER METHODS

    // Status in color
    public function statusInColor(){
        switch($this->status){
            case 'public':
                $color = '!text-green-300';
                $icon = 'fa-eye';
                break;
            case 'private':
                $color = '!text-red-300';
                $icon = 'fa-eye-slash';
                break;
            case 'unlisted':
                $color = '!text-blue-300';
                $icon = 'fa-eye';
                break;
            default:
                $color = '!text-white';
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


    // RENDERING METHODS
    
    // Get image
    public function getImage(){
        if(!$this->image){
            return asset('images/no-image.png');
        }

        return asset('images/companies/'.$this->hex.'/'.$this->image);
    }

    // Get image thumbnail
    public function getImageThumbnail(){
        if(!$this->image){
            return asset('images/tn-no-image.png');
        }

        return asset('images/companies/'.$this->hex.'/tn-'.$this->image);
    }

    

    // Functions for turnover and employees charts

    // Fetch array of 'years' where this company has turnover data
    public function turnoverYears(){
        $years = Ranking::where('company_id', $this->id)
            ->where('turnover', '!=', null)
            ->orderBy('year', 'ASC')
            ->pluck('year')
            ->toArray();
        return implode(',', $years);
    }

     // Fetch array of 'turnovers' for this company
    public function rankingTurnovers(){
        $turnovers = Ranking::where('company_id', $this->id)
            ->where('turnover', '!=', null)
            ->orderBy('turnover', 'ASC')
            ->pluck('turnover')
            ->toArray();
        return implode(',', $turnovers);
    }

    // Find the lowest turnover for this company
    public function lowestTurnover($format = 'rounded'){
        $turnover = Ranking::where('company_id', $this->id)->orderBy('turnover', 'ASC')->first()->turnover;
        $turnover = floor($turnover/100000000)*100000000;
        if($format === 'full'){
            return $turnover;
        }
        return $turnover;
    }

    // Find the highest turnover for this company
    public function highestTurnover($format = 'rounded'){
        $turnover = Ranking::where('company_id', $this->id)->orderBy('turnover', 'DESC')->first()->turnover;
        $turnover = ceil($turnover/100000000)*100000000;
        if($format === 'full'){
            return $turnover;
        }
        return $turnover;
    }

    // Find the range between the highest and lowest turnovers for this company
    public function turnoverRange(){
        $range = $this->highestTurnover('full') - $this->lowestTurnover('full');
        return $range;
    }

    // Round the value for the lower scale of the Y axis
    public function turnover_low_y_axis(){
        $digits = strlen($this->turnoverRange());
        if($digits >= 11){
            $rounder = 10000000000;
        }
        elseif($digits >= 10){
            $rounder = 1000000000;
        }
        elseif($digits >= 9){
            $rounder = 100000000;
        }
        return floor($this->lowestTurnover()/$rounder)*$rounder;
    }

    // Round the value for the higher scale of the Y axis
    public function turnover_high_y_axis(){
        $digits = strlen($this->turnoverRange());
        if($digits >= 11){
            $rounder = 10000000000;
        }
        if($digits >= 10){
            $rounder = 1000000000;
        }
        elseif($digits >= 9){
            $rounder = 100000000;
        }
        return ceil($this->highestTurnover()/$rounder)*$rounder;
    }








    // Fetch array of 'years' where this company has employees data
    public function employeesYears(){
        $years = Ranking::where('company_id', $this->id)
            ->where('employees', '!=', null)
            ->orderBy('year', 'ASC')
            ->pluck('year')
            ->toArray();
        return implode(',', $years);
    }

     // Fetch array of 'employees' for this company
    public function rankingEmployees(){
        $employees = Ranking::where('company_id', $this->id)
            ->where('employees', '!=', null)
            ->orderBy('year', 'ASC')
            ->pluck('employees')
            ->toArray();
        return implode(',', $employees);
    }

    // Find the lowest employees for this company
    public function lowestEmployees($format = 'rounded'){
        $employees = Ranking::where('company_id', $this->id)->orderBy('employees', 'ASC')->first()->employees;
        if($format === 'full'){
            return $employees;
        }
        return floor($employees/100)*100;
    }

    // Find the highest employees for this company
    public function highestEmployees($format = 'rounded'){
        $employees = Ranking::where('company_id', $this->id)->orderBy('turnover', 'DESC')->first()->employees;
        if($format === 'full'){
            return $employees;
        }
        return ceil($employees/100)*100;
    }

    // Find the range between the highest and lowest turnovers for this company
    public function employeesRange(){
        $range = $this->highestEmployees('full') - $this->lowestEmployees('full');
        return $range;
    }

    // Round the value for the lower scale of the Y axis
    public function employees_low_y_axis(){
        $digits = strlen($this->employeesRange());
        if($digits >= 11){
            $rounder = 10000000000;
        }
        elseif($digits >= 5){
            $rounder = 10000;
        }
        else{
            $rounder = 1;
        }
        return floor($this->lowestEmployees()/$rounder)*$rounder;
    }

    // Round the value for the higher scale of the Y axis
    public function employees_high_y_axis(){
        $digits = strlen($this->employeesRange());
        if($digits >= 11){
            $rounder = 10000000000;
        }
        if($digits >= 5){
            $rounder = 10000;
        }
        else{
            $rounder = 1;
        }
        
        return ceil($this->highestEmployees()/$rounder)*$rounder;
    }




    

    




}
