<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_types = UserType::on('mysql_import')->get();

        foreach($user_types as $user_type) {
            UserType::create([
                'hex' => $user_type->hex,
                'name' => $user_type->name,
                'slug' => $user_type->slug,
                'active' => $user_type->active
            ]);

        }

    }

}
