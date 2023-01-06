<?php

namespace Database\Seeders;

use App\Models\ColorTheme;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ColorThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $color_themes = ColorTheme::on('mysql_import')->get();

        foreach($color_themes as $color_theme){
    
            ColorTheme::create([
                'hex' => $color_theme->hex,
                'user_id' => $color_theme->user_id,
                'name' => $color_theme->name,
                'slug' => $color_theme->slug,
                'description' => $color_theme->description,
                'image' => $color_theme->image,
                'created_at' => $color_theme->created_at,
                'updated_at' => $color_theme->updated_at
            ]);
    
        }

    }

}
