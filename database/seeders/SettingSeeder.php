<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = Setting::on('mysql_import')->get();

        foreach($settings as $setting){

            Setting::create([
                'hex' => $setting->hex,
                'meta_title' => $setting->meta_title,
                'meta_description' => $setting->meta_description,
                'meta_author' => $setting->meta_author,
                'meta_copyright' => $setting->meta_copyright,
                'color_theme_id' => $setting->color_theme_id,
                'date_format' => $setting->date_format,
                'time_format' => $setting->time_format,
                'created_at' => $setting->created_at,
                'updated_at' => $setting->updated_at

            ]);
        
        }
       
    }

}
