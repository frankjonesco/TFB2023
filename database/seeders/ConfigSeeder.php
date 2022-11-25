<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ConfigSeeder extends Seeder
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
        ];

        Config::create($config);
    }
}
