<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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



    // Handle image upload
    public function handleImageUpload($request, $directory, $hex){  
        // If an image has been added to the request
  
            // Define a name for the new image
            $image_name = Str::random('6').'-'.time().'.'.$request->image->extension();
            // Specify the direcory path
            $directory_path = public_path('images/'.$directory.'/'.$hex);
            // Store in public folder
            $request->file('image')->move($directory_path, $image_name);
            // List all the file in the directory
            $files_in_folder = File::allFiles($directory_path);
            // Delete all files that are not the new image
            foreach($files_in_folder as $key => $path){
                if($path != $directory_path.'/'.$image_name){
                    File::delete($path);
                }
            }
            // Create a thumbnail
            self::makeImageThumbnail($directory_path, $image_name);

            return $image_name;
        
       
    }


    // Make image thumbnail
    public function makeImageThumbnail($directory_path, $image_name){
        // Resize image thumbnail
        Image::make($directory_path.'/'.$image_name)
            ->resize(240, null, function ($constraint){ 
                $constraint->aspectRatio(); 
            })
            ->save($directory_path.'/tn-'.$image_name);
    }
}
