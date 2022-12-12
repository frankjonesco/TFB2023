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
        $config = [
            'hex' => Str::random(11),
            'color_theme_id' => 1,
            'date_format' => 'd M Y - H:i'
        ];

        Setting::create($config);
    }
}
