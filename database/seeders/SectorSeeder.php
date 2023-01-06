<?php

namespace Database\Seeders;

use App\Models\Site;
use App\Models\Sector;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sectors = Sector::on('mysql_import')->get();

        foreach($sectors as $sector){
            
            Sector::create([
                'hex' => $sector->hex,
                'user_id' => $sector->user_id,
                'name' => $sector->name,
                'slug' => $sector->slug,
                'english_name' => $sector->english_name,
                'english_slug' => $sector->english_slug,
                'description' => $sector->description,
                'image' => $sector->image,
                'color_id' => $sector->color_id,
                'created_at' => $sector->created_at,
                'updated_at' => $sector->updated_at,
                'status' => $sector->status
            ]);

        }

    }

}
