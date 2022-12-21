<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ranking extends Model
{
    use HasFactory;

    public function calculateGrowth(){
        $previous = Ranking::where(['company_id' => $this->company_id, 'year' => $this->year - 1])->first();
        $percentChange = ($previous ? (($this->turnover - $previous->turnover) / (($this->turnover + $previous->turnover) / 2)) * 100 : null);
        return number_format($percentChange, 2).'%';
    }
}
