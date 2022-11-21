<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sector extends Model
{
    use HasFactory;

    // Set the route key name
    public function getRouteKeyName(){
        return 'hex';
    }




    public function saveText(){
        $this->save();
        return $this;
    }
}
