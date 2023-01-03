<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    // RELATIONSHIPS

    // Relationship to article
    public function article(){
        return $this->hasOne(Article::class);
    }
}
