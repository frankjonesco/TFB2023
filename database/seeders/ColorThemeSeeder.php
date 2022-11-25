<?php

namespace Database\Seeders;

use App\Models\ColorTheme;
use Illuminate\Support\Str;
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
        $color_themes = [
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'name' => 'Lisbon Streets',
                'slug' => 'lisbon-streets',
                'description' => 'Vibrant and artistic flavours provide enthusiasm and positivity.',
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'name' => 'Delhi Colors',
                'slug' => 'delhi-colors',
                'description' => 'Blues & oranges, freedom, youth, confidence & security.',
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'name' => 'Waterfall Bridge',
                'slug' => 'waterfall-bridge',
                'description' => 'Earthy tones promoting trust, optimism and loyalty.',
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'name' => 'Cherry Blossum',
                'slug' => 'cherry-blossum',
                'description' => 'A soft, calm and creative palette. Clean and professional.',
            ]
        ];

        collect($color_themes)->each(function($color_theme){ ColorTheme::create($color_theme); });
    }
}
