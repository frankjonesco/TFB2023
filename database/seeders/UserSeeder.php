<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserType;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Import users
        $users = User::on('mysql_import')->whereIn('id', [7, 8, 10, 20])->get();

        // Create users
        foreach($users as $user){
            User::create([
                'old_id' => $user->id,
                'hex' => Str::random(11),
                'user_type_id' => $user->user_type,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'username' => $user->username,
                'email' => $user->email,
                'email_verified_at' => $user->created,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
                'remember_token' => Str::random(10),
                'image' => $user->image,
                'gender' => $user->gender,
                'country_iso' => $user->country,
                'color_fill_id' => null,
                'created_at' => $user->created,
            ]);
        }


        // HANDLE IMAGE TRANSFER

        // Delete existing directory
        File::deleteDirectory(public_path('images/users'));

        // Get users
        $users = User::all();

        // For each user
        foreach($users as $user){
            // Source and destination paths
            $source_path = public_path('import_images/users/'.$user->old_id);
            $destination_path = public_path('images/users/'.$user->hex);

            // Copy source to destination if source exists
            if(File::isDirectory($source_path)){
                File::copyDirectory($source_path, $destination_path);

                // If user has image
                if($user->image){
                    // Format a filename
                    $random = Str::random(11);
                    $image_name = $random.'.jpg';
                    $thumbnail_name = 'tn-'.$image_name;

                    // Old image paths
                    $old_image_path = $destination_path.'/'.$user->image;
                    $old_thumbnail_path = $destination_path.'/thumb-'.$user->image;

                    // New image paths
                    $new_image_path = $destination_path.'/'.$image_name;
                    $new_thumbnail_path = $destination_path.'/'.$thumbnail_name;

                    // Rename image
                    File::move($old_image_path, $new_image_path);
                    File::move($old_thumbnail_path, $new_thumbnail_path);

                    // List files in user's directory
                    $files_in_folder = File::allFiles($destination_path);

                    // Delete irrelevant files
                    foreach($files_in_folder as $file){
                        if($file != $new_image_path && $file != $new_thumbnail_path){
                            File::delete($file);
                        }
                    }

                    // Save new image name
                    $user->image = $image_name;
                    $user->save();
                }
            }
        }

        // Transfer default profile pics
        File::copy(
            public_path('import_images/users/default-profile-pic-male.jpg'),
            public_path('images/users/profile-pic-male.jpg')
        );
        File::copy(
            public_path('import_images/users/default-profile-pic-female.jpg'),
            public_path('images/users/profile-pic-female.jpg')
        );
    }
}
