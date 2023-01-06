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
        $users = User::on('mysql_import')->get();

        foreach($users as $user){

            User::create([
                'hex' => $user->hex,
                'user_type_id' => $user->user_type_id,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'username' => $user->username,
                'email' => $user->email,
                'email_verified_at' => $user->email_verified_at,
                'password' => $user->password, // password,
                'remember_token' => $user->remember_token,
                'image' => $user->image,
                'gender' => $user->gender,
                'country_iso' => $user->country,
                'color_fill_id' => $user->color_fill_id,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at
            ]);

        }

    }

}
