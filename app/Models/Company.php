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

    // public function chartDataForTurnover(){
    //     $array = [];
    //     foreach($this->rankings as $ranking){
    //         $array[] = [$ranking->year, $ranking->turnover / 1000000];
    //     }
    //     return json_encode($array);
    // }

    public function chartDataForTurnover(){
        $array = [];
        foreach($this->rankings()->orderBy('year', 'ASC')->get() as $ranking){
            $array[] = number_format(round($ranking->turnover / 1000000), 0, ',' , '.' );
        }
        return implode(',', $array);
    }

    public function lowestTurnover(){
        $turnover = Ranking::where('company_id', $this->id)->orderBy('turnover', 'ASC')->first()->turnover;
        $turnover = floor($turnover/100000000)*100000000;
        return $turnover/1000000;
    }

    public function highestTurnover(){
        $turnover = Ranking::where('company_id', $this->id)->orderBy('turnover', 'DESC')->first()->turnover;
        $turnover = ceil($turnover/100000000)*100000000;
        return $turnover/1000000;
    }

    public function turnoverRange(){
        $range = $this->highestTurnover() - $this->lowestTurnover();
        return $range;
    }

    public function turnover_y_axis_values($ticks = 5){
        
        $ticks = $ticks - 1;
        $interval = $this->turnoverRange() / $ticks;

        $first = $this->lowestTurnover();
        $second = $this->lowestTurnover() + $interval;
        $third = $this->lowestTurnover() + ($interval * 2);
        $forth = $this->lowestTurnover() + ($interval * 3);
        $fifth = $this->highestTurnover();

        $first = $first * 1;
        $second = $second * 1;
        $third = $third * 1;
        $forth = $forth * 1;
        $fifth = $fifth * 1;

        
        $first = number_format(round($first / 1), 0, ',' , '.' );
        $second = number_format(round($second / 1), 0, ',' , '.' );
        $third = number_format(round($third / 1), 0, ',' , '.' );
        $forth = number_format(round($forth / 1), 0, ',' , '.' );
        $fifth = number_format(round($fifth / 1), 0, ',' , '.' );
        
        $values = $first.','.$second.','.$third.','.$forth.','.$fifth;
        return $values;
    }

    

    // public function turnoverRange(){
    //     $lower_turnover = Ranking::where('company_id', $this->id)->orderBy('turnover', 'ASC')->first()->turnover;
    //     $higher_turnover = Ranking::where('company_id', $this->id)->orderBy('turnover', 'DESC')->first()->turnover;
    //     $range = $higher_turnover - $lower_turnover;
    //     $rounded_range = ceil(($range/1000)*1000);
    //     return floor($rounded_range / 1000000);
    // }

    public function ranking_y_axis_rounder(){
        // dd($this->turnoverRange());
        if($this->turnoverRange() > 10000){
            return 10000;
        }

        elseif($this->turnoverRange() > 1000){
            return 100;
        }

        elseif($this->turnoverRange() > 100){
            return 10;
        }

        elseif($this->turnoverRange() > 30){
            return 5;
        }

        elseif($this->turnoverRange() > 10){
            return 5;
        }

        return 1;
    }
    


}
