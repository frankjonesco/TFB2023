<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    // START: RETRIEVAL METHODS
    
        // SECTORS
        
        // All sectors
        public function allSectors(){
            return Sector::orderBy('name', 'ASC')->get();
        }

        // Public sectors
        public function publicSectors(){
            return Sector::where('status', 'public')->orderBy('name', 'ASC')->get();
        }

    // END: RETRIEVAL METHODS
}
