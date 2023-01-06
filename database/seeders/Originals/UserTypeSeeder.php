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
        // Import user types
        $user_types = UserType::on('mysql_import')->get();

        // Create user types
        foreach($user_types as $user_type) {
            UserType::create([
                'old_id' => $user_type->id,
                'hex' => Str::random(11),
                'name' => $user_type->name,
                'slug' => Str::slug($user_type->name),
                'active' => $user_type->active
            ]);
        }
    }
}
