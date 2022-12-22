<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ranking extends Model
{
    use HasFactory;

    public function calculateGrowth($column = 'turnover'){
        $previous = Ranking::where(['company_id' => $this->company_id, 'year' => $this->year - 1])->first();
        $percentChange = ($previous ? (($this->$column - $previous->$column) / (($this->$column + $previous->$column) / 2)) * 100 : null);
        if($percentChange){
            return number_format($percentChange, 2);
        }
    }

    

    public function sourceText(){

        switch ($this->source) {
            case 0:
                $text = 'Matchbird research';
                break;
            case 1:
                $text = 'Matchbird research';
                break;
            default:
                $text = 'Unknown';
        }

        return $text;
    }


    public function sourceIconColor(){

        switch ($this->source) {
            case 0:
                $icon = 'text-red-500';
                break;
            case 1:
                $icon = 'text-lime-700';
                break;
            default:
                $icon = 'text-sky-700';
        }

        return $icon;
    }
}
