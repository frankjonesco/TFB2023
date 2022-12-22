<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // RELATIONSHIPS

    // Relationship to company
    public function company(){
        return $this->belongsTo(Company::class, 'company_id');
    }

    // Relationship to article
    public function article(){
        return $this->belongsTo(Article::class, 'resource_id');
    }

    // Relationship to user
    public function user(){
        return $this->belongsTo(User::class);
    }
}
