<?php

namespace Database\Seeders;

use App\Models\Site;
use App\Models\Industry;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $industries = Industry::on('mysql_import')->get();

        foreach($industries as $industry){
            
            Industry::create([
                'hex' => $industry->hex,
                'user_id' => $industry->random_user_id,
                'name' => $industry->name,
                'slug' => $industry->slug,
                'english_name' => $industry->english_name,
                'english_slug' => $industry->english_slug,
                'description' => $industry->description,
                'created_at' => $industry->created_at,
                'updated_at' => $industry->updated_at,
                'status' => $industry->status
            ]);

        }

    }

}
