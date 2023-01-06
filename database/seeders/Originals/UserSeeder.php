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

            $ids = [1,2,3,4,5,6,7,8,9,10,11,12,13,14];
            $random_color_fill_id = $ids[array_rand($ids)];

            User::create([
                'old_id' => $user->id,
                'hex' => Str::random(11),
                'user_type_id' => $user->user_type->id,
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
                'color_fill_id' => $random_color_fill_id,
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


        // DUMMY PUBLIC USERS

        //Jennifer Wilcox
        User::create([
            'hex' => 'gZTl3cNBLPt',
            'user_type_id' => 1,
            'first_name' => 'Jennifer',
            'last_name' => 'Wilcox',
            'username' => 'jWils92',
            'email' => 'jennifer.wilcox@gmail.com',
            'email_verified_at' => time(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
            'remember_token' => Str::random(10),
            'image' => 'sngAwi5o9o9.jpg',
            'gender' => 'female',
            'country_iso' => 'US',
            'color_fill_id' => 10,
        ]);

        File::makeDirectory(public_path('images/users/gZTl3cNBLPt/'), 0777, true, true);

        File::copy(
            public_path('import_images/users/dummies/jwilcox.jpg'),
            public_path('images/users/gZTl3cNBLPt/sngAwi5o9o9.jpg')
        );
        
        File::copy(
            public_path('import_images/users/dummies/jwilcox.jpg'),
            public_path('images/users/gZTl3cNBLPt/tn-sngAwi5o9o9.jpg')
        );

        // Julian Thorpe
        User::create([
            'hex' => 'S3dTl8DfkJ7',
            'user_type_id' => 1,
            'first_name' => 'Julian',
            'last_name' => 'Thorpe',
            'username' => 'thorpomatic',
            'email' => 'julian.thorpe@gmail.com',
            'email_verified_at' => time(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
            'remember_token' => Str::random(10),
            'image' => 'gjUTZnwoVV2.jpg',
            'gender' => 'male',
            'country_iso' => 'NO',
            'color_fill_id' => 7,
        ]);

        File::makeDirectory(public_path('images/users/S3dTl8DfkJ7/'), 0777, true, true);

        File::copy(
            public_path('import_images/users/dummies/jthorpe.jpg'),
            public_path('images/users/S3dTl8DfkJ7/gjUTZnwoVV2.jpg')
        );
        
        File::copy(
            public_path('import_images/users/dummies/jthorpe.jpg'),
            public_path('images/users/S3dTl8DfkJ7/tn-gjUTZnwoVV2.jpg')
        );

        // Sara Gerber
        User::create([
            'hex' => 'x5DQYTBOA44',
            'user_type_id' => 1,
            'first_name' => 'Sara',
            'last_name' => 'Gerber',
            'username' => 'GerbilQueen',
            'email' => 'sara.gerber@gmail.com',
            'email_verified_at' => time(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
            'remember_token' => Str::random(10),
            'image' => 'fiwgKJCXmmr.jpg',
            'gender' => 'male',
            'country_iso' => 'NO',
            'color_fill_id' => 7,
        ]);

        File::makeDirectory(public_path('images/users/x5DQYTBOA44/'), 0777, true, true);

        File::copy(
            public_path('import_images/users/dummies/sgerber.jpg'),
            public_path('images/users/x5DQYTBOA44/fiwgKJCXmmr.jpg')
        );
        
        File::copy(
            public_path('import_images/users/dummies/sgerber.jpg'),
            public_path('images/users/x5DQYTBOA44/tn-fiwgKJCXmmr.jpg')
        );

        // Alex Sterling
        User::create([
            'hex' => 'PvIhVLMPUff',
            'user_type_id' => 1,
            'first_name' => 'Alex',
            'last_name' => 'Sterling',
            'username' => 'sterling_castle983',
            'email' => 'alex.sterling@gmail.com',
            'email_verified_at' => time(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
            'remember_token' => Str::random(10),
            'image' => 'aDBGLkNf8O1.jpg',
            'gender' => 'male',
            'country_iso' => 'NL',
            'color_fill_id' => 12,
        ]);

        File::makeDirectory(public_path('images/users/PvIhVLMPUff/'), 0777, true, true);

        File::copy(
            public_path('import_images/users/dummies/asterling.jpg'),
            public_path('images/users/PvIhVLMPUff/aDBGLkNf8O1.jpg')
        );
        
        File::copy(
            public_path('import_images/users/dummies/asterling.jpg'),
            public_path('images/users/PvIhVLMPUff/tn-aDBGLkNf8O1.jpg')
        );

        // Gordon Fuller
        User::create([
            'hex' => 'mDWQsA15bfP',
            'user_type_id' => 1,
            'first_name' => 'Gordon',
            'last_name' => 'Fuller',
            'username' => 'GF1985',
            'email' => 'gordon.fuller@gmail.com',
            'email_verified_at' => time(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
            'remember_token' => Str::random(10),
            'image' => 'xgrLHgc6QeK.jpg',
            'gender' => 'male',
            'country_iso' => 'DE',
            'color_fill_id' => 4,
        ]);

        File::makeDirectory(public_path('images/users/mDWQsA15bfP/'), 0777, true, true);

        File::copy(
            public_path('import_images/users/dummies/gfuller.jpg'),
            public_path('images/users/mDWQsA15bfP/xgrLHgc6QeK.jpg')
        );
        
        File::copy(
            public_path('import_images/users/dummies/gfuller.jpg'),
            public_path('images/users/mDWQsA15bfP/tn-xgrLHgc6QeK.jpg')
        );

        // Elly Holms
        User::create([
            'hex' => '2kmnwhNsLHu',
            'user_type_id' => 1,
            'first_name' => 'Elly',
            'last_name' => 'Holms',
            'username' => 'EH198475',
            'email' => 'elly.holms@gmail.com',
            'email_verified_at' => time(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
            'remember_token' => Str::random(10),
            'image' => 'aKlU3CPOaBg.jpg',
            'gender' => 'female',
            'country_iso' => 'US',
            'color_fill_id' => 2,
        ]);

        File::makeDirectory(public_path('images/users/2kmnwhNsLHu/'), 0777, true, true);

        File::copy(
            public_path('import_images/users/dummies/eholms.jpg'),
            public_path('images/users/2kmnwhNsLHu/aKlU3CPOaBg.jpg')
        );
        
        File::copy(
            public_path('import_images/users/dummies/eholms.jpg'),
            public_path('images/users/2kmnwhNsLHu/tn-aKlU3CPOaBg.jpg')
        );
    }
}
