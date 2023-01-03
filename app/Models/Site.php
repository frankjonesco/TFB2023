<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Site extends Model
{
    use HasFactory;

    // START: RETRIEVAL METHODS

    // COLORS

    // Site colors
    public function allColors(){
        return Color::where('color_theme_id', 1)->orderBy('fill_id', 'ASC')->get();
    }


    
    // SECTORS
        
    // All sectors
    public function allSectors(){
        return Sector::orderBy('english_name', 'ASC')->get();
    }

    // Paginate all sectors
    public function paginateAllSectors(){
        return Sector::orderBy('english_name', 'ASC')->paginate(10);
    }

    // Public sectors
    public function publicSectors(){
        return Sector::where('status', 'public')->orderBy('name', 'ASC')->get();
    }



    // INDUSTRIES
        
    // All sectors
    public function allIndustries(){
        return Industry::orderBy('english_name', 'ASC')->get();
    }

    // Paginate all sectors
    public function paginateAllIndustries(){
        return Industry::orderBy('english_name', 'ASC')->paginate(10);
    }

    // Public sectors
    public function publicIndustries(){
        return Industry::where('status', 'public')->orderBy('name', 'ASC')->get();
    }



    // COMPANIES
        
    // All companies
    public function allCompanies(){
        return Company::orderBy('registered_name', 'ASC')->get();
    }

    // Paginate all companies
    public function paginateAllCompanies(){
        return Company::orderBy('registered_name', 'ASC')->paginate(10);
    }

    // Public companies
    public function publicCompanies(){
        return Company::where('status', 'public')->orderBy('registered_name', 'ASC')->get();
    }

    // Paginate public companies
    public function paginatePublicCompanies(){
        return Company::where('status', 'public')->orderBy('registered_name', 'ASC')->paginate(20);
    }

    // Paginate public companies
    public function paginatePublicCompaniesAndRankingsLatest($take = 20){
        return Company::with('rankings')
        ->join('rankings', 'rankings.company_id', '=', 'companies.id')
        ->where('rankings.is_latest', true)
        ->where('rankings.turnover', '>=', 250000000)
        ->where('companies.family_business', 1)
        ->where('companies.tofam_status', 'in')
        ->select('companies.*', 'rankings.id AS ranking_id') // Avoid selecting everything from the stocks table
        ->orderBy('rankings.turnover', 'DESC')
        ->paginate($take);
    }

    // Paginate public companies
    public function paginatePublicCompaniesAndRankingsByYear($year = 2014){
        return Company::with('rankings')
        ->join('rankings', 'rankings.company_id', '=', 'companies.id')
        ->where('rankings.year', $year)
        ->where('rankings.turnover', '>=', 250000000)
        ->where('companies.family_business', 1)
        ->where('companies.tofam_status', 'in')
        ->select('companies.*', 'rankings.id AS ranking_id') // Avoid selecting everything from the stocks table
        ->orderBy('rankings.turnover', 'DESC')
        ->paginate(20);
    }



    // CATEGORIES
        
    // All categories
    public function allCategories(){
        return Category::orderBy('name', 'ASC')->get();
    }

    // Paginate all categories
    public function paginateAllCategories(){
        return Category::orderBy('name', 'ASC')->paginate(10);
    }

    // Public categories
    public function publicCategories(){
        return Category::where('status', 'public')->orderBy('name', 'ASC')->get();
    }



    // ARTICLES
        
    // All articles
    public function allArticles(){
        return Article::orderBy('created_at', 'DESC')->get();
    }

    // Paginate all articles
    public function paginateAllArticles(){
        return Article::orderBy('created_at', 'DESC')->paginate(10);
    }

    // Public categories
    public function publicArticles(){
        return Article::where('status', 'public')->orderBy('created_at', 'DESC')->get();
    }



    // USERS
        
    // All users
    public function allUsers(){
        return User::orderBy('first_name', 'ASC')->get();
    }

    // Paginate all users
    public function paginateAllUsers(){
        return User::orderBy('first_name', 'ASC')->paginate(10);
    }

    // All users
    public function allAdminUsers(){
        return User::where('user_type_id', '>=', 6)->orderBy('first_name', 'ASC')->get();
    }



    // PARTNERS

    // Public sponsors
    public function publicPartners(){
        return Partner::where('active', 1)->orderBy('id', 'ASC')->get();
    }

    // END: RETRIEVAL METHODS




    // START: FORMATTING METHODS

    // Prep slug
    public function slug($value){
        $value = strtolower($value);
        $value = trim($value);
        $value = str_replace('ä', 'ae', $value);
        $value = str_replace('ö', 'oe', $value);
        $value = str_replace('ü', 'ue', $value);
        $value = str_replace('ß', 'ss', $value);
        $value = str_replace('/', '-', $value);
        $value = str_replace('&', 'and', $value);
        return Str::slug($value);
    }

    // END: FORMATTING METHODS




    // START: IMAGE HANDLING METHODS

    // Handle image upload
    public function handleImageUpload($request, $directory, $hex){  
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

    // Handle rendered image
    public function handleRenderedImage($data, $directory, $hex, $image){
        // Round crop parameter to integer value
        $w = round($data['w']);
        $h = round($data['h']);
        $x = round($data['x']);
        $y = round($data['y']);

        // Open file as image resource
        $img = Image::make(asset('images/'.$directory.'/'.$hex.'/'.$image));

        // Crop image
        $img->crop($w,$h,$x,$y);

        // Save full size image
        $img->resize(867,423);
        $img->save('images/'.$directory.'/'.$hex.'/'.$image);

        // Save thumbnail image
        $img->resize(240, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save('images/'.$directory.'/'.$hex.'/tn-'.$image);
    }

    // Handle image tranfer
    public function handleImageTransfer($directory, $rows, $filename_prefix = null){
        // Delete existing directory
        File::deleteDirectory(public_path('images/'.$directory));

        // For each row
        foreach($rows as $row){
            // Source and destination paths
            $source_path = public_path('import_images/'.$directory.'/'.$row->old_id);
            $destination_path = public_path('images/'.$directory.'/'.$row->hex);

            // Copy source to destination if source exists
            if(File::isDirectory($source_path)){
                File::copyDirectory($source_path, $destination_path);

                // If row has image
                if($row->image){
                    // Format a filename
                    $random = Str::random(11);
                    $image_name = $random.'.jpg';

                    // Old image path
                    $old_image_path = $destination_path.'/'.$filename_prefix.$row->image;

                    // New image path
                    $new_image_path = $destination_path.'/'.$image_name;

                    // Rename image
                    File::move($old_image_path, $new_image_path);

                    // List files in user's directory
                    $files_in_folder = File::allFiles($destination_path);

                    // Delete irrelevant files
                    foreach($files_in_folder as $file){
                        if($file != $new_image_path){
                            File::delete($file);
                        }
                    }

                    // Save new image name
                    $row->image = $image_name;
                    $row->save();

                    // Create a thumbnail
                    self::makeImageThumbnail($destination_path, $image_name);
                }
            }
        }
    }

    // END: IMAGE HANDLING METHODS
}
