<?php

namespace App\Models;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sector extends Model
{
    use HasFactory;

    // Set the route key name
    public function getRouteKeyName(){
        return 'hex';
    }



    // Save text (update)
    public function saveText(){
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

        $w = round($data['w']);
        $h = round($data['h']);
        $x = round($data['x']);
        $y = round($data['y']);

        // Open file a image resource
        $img = Image::make(asset('/images/sectors/'.$this->hex.'/'.$this->image));

        // Crop image
        $img->crop($w,$h,$x,$y);

        // Save full size image
        $img->resize(867,423);
        $img->save('images/sectors/'.$this->hex.'/'.$this->image);

        // Save thumbnail image
        $img->resize(240, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save('images/sectors/'.$this->hex.'/tn-'.$this->image);
    }
}
