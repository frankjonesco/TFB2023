<?php

namespace Database\Seeders;

use App\Models\Site;
use App\Models\User;
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
        $site = new Site();
        
        $site->handleImageTransfer('users', User::all());

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
