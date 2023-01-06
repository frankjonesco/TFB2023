<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
            [
                'color_theme_id' => 1, 
                'fill_id' => 1, 
                'code' => '5c1b27', 
                'name' => 'Volcanic', 
            ],
            [
                'color_theme_id' => 1, 
                'fill_id' => 2, 
                'code' => 'ed9986', 
                'name' => 'Pigglit', 
            ],
            [
                'color_theme_id' => 1, 
                'fill_id' => 3, 
                'code' => 'd90b00', 
                'name' => 'Blood Red', 
            ],
            [
                'color_theme_id' => 1, 
                'fill_id' => 4, 
                'code' => '9f2521', 
                'name' => 'Burgandy', 
            ],
            [
                'color_theme_id' => 1, 
                'fill_id' => 5, 
                'code' => '4f1923', 
                'name' => 'Amethyst', 
            ],
            [
                'color_theme_id' => 1, 
                'fill_id' => 6, 
                'code' => 'f66f04', 
                'name' => 'Nectar', 
            ],
            [
                'color_theme_id' => 1, 
                'fill_id' => 7, 
                'code' => 'fccf0a', 
                'name' => 'Lemon Sorbet', 
            ],
            [
                'color_theme_id' => 1, 
                'fill_id' => 8, 
                'code' => '7f5505', 
                'name' => 'Whiskey Barrel', 
            ],
            [
                'color_theme_id' => 1, 
                'fill_id' => 9, 
                'code' => '080e5d', 
                'name' => 'Star Sky', 
            ],
            [
                'color_theme_id' => 1, 
                'fill_id' => 10, 
                'code' => '0e89c4', 
                'name' => 'Fuji', 
            ],
            [
                'color_theme_id' => 1, 
                'fill_id' => 11, 
                'code' => 'cee7ed', 
                'name' => 'River Rocks', 
            ],
            [
                'color_theme_id' => 1, 
                'fill_id' => 12, 
                'code' => '94d0b7', 
                'name' => 'Green Tea', 
            ],
            [
                'color_theme_id' => 1, 
                'fill_id' => 13, 
                'code' => '16eece', 
                'name' => 'Mermaid', 
            ],
            [
                'color_theme_id' => 1, 
                'fill_id' => 14, 
                'code' => '016f34', 
                'name' => 'Astroturf ', 
            ],
            




            [
                'color_theme_id' => 2, 
                'fill_id' => 1, 
                'code' => '01152a', 
                'name' => 'Obsidian', 
            ],
            [
                'color_theme_id' => 2, 
                'fill_id' => 2, 
                'code' => '012f4e', 
                'name' => 'Midnight Sky', 
            ],
            [
                'color_theme_id' => 2, 
                'fill_id' => 3, 
                'code' => '025788', 
                'name' => 'Blue Lace', 
            ],
            [
                'color_theme_id' => 2, 
                'fill_id' => 4, 
                'code' => '7495cc', 
                'name' => 'Deluxe Dawn', 
            ],
            [
                'color_theme_id' => 2, 
                'fill_id' => 5, 
                'code' => 'adc2eb', 
                'name' => 'Light lavender', 
            ],
            [
                'color_theme_id' => 2, 
                'fill_id' => 6, 
                'code' => '2c150c', 
                'name' => 'Birch Bark', 
            ],
            [
                'color_theme_id' => 2, 
                'fill_id' => 7, 
                'code' => '593328', 
                'name' => 'Timber', 
            ],
            [
                'color_theme_id' => 2, 
                'fill_id' => 8, 
                'code' => '9e5c42', 
                'name' => 'Breadboard', 
            ],
            [
                'color_theme_id' => 2, 
                'fill_id' => 9, 
                'code' => '812f01', 
                'name' => 'Chestnut', 
            ],
            [
                'color_theme_id' => 2, 
                'fill_id' => 10, 
                'code' => 'ca4e00', 
                'name' => 'Suntan', 
            ],
            [
                'color_theme_id' => 2, 
                'fill_id' => 11, 
                'code' => 'ffb202', 
                'name' => 'Sunshine', 
            ],
            [
                'color_theme_id' => 2, 
                'fill_id' => 12, 
                'code' => 'f25460', 
                'name' => 'Candyfloss', 
            ],
            [
                'color_theme_id' => 2, 
                'fill_id' => 13, 
                'code' => '39c516', 
                'name' => 'Apple Tango', 
            ],
            [
                'color_theme_id' => 2, 
                'fill_id' => 14, 
                'code' => 'aac963', 
                'name' => 'New leaves', 
            ],



            [
                'color_theme_id' => 3, 
                'fill_id' => 1, 
                'code' => '22170b', 
                'name' => 'Dark night', 
            ],
            [
                'color_theme_id' => 3, 
                'fill_id' => 2, 
                'code' => '542a00', 
                'name' => 'Coco Butter', 
            ],
            [
                'color_theme_id' => 3, 
                'fill_id' => 3, 
                'code' => '844d08', 
                'name' => 'Butterscotch', 
            ],
            [
                'color_theme_id' => 3, 
                'fill_id' => 4, 
                'code' => 'bc801b', 
                'name' => 'Caramel', 
            ],
            [
                'color_theme_id' => 3, 
                'fill_id' => 5, 
                'code' => 'f6dc94', 
                'name' => 'Sawdust', 
            ],
            [
                'color_theme_id' => 3, 
                'fill_id' => 6, 
                'code' => '474911', 
                'name' => 'Seaweed', 
            ],
            [
                'color_theme_id' => 3, 
                'fill_id' => 7, 
                'code' => '748a0a', 
                'name' => 'Golf course', 
            ],
            [
                'color_theme_id' => 3, 
                'fill_id' => 8, 
                'code' => '4f8937', 
                'name' => 'Shamrock', 
            ],
            [
                'color_theme_id' => 3, 
                'fill_id' => 9, 
                'code' => '9f9a22', 
                'name' => 'Desert Tank', 
            ],
            [
                'color_theme_id' => 3, 
                'fill_id' => 10, 
                'code' => '325c64', 
                'name' => 'Sharkskin', 
            ],
            [
                'color_theme_id' => 3, 
                'fill_id' => 11, 
                'code' => '4e7069', 
                'name' => 'Wolf fur', 
            ],
            [
                'color_theme_id' => 3, 
                'fill_id' => 12, 
                'code' => '53808a', 
                'name' => 'Fish scales', 
            ],
            [
                'color_theme_id' => 3, 
                'fill_id' => 13, 
                'code' => 'a36f5f', 
                'name' => 'Courthouse Stone', 
            ],
            [
                'color_theme_id' => 3, 
                'fill_id' => 14, 
                'code' => 'a13642', 
                'name' => 'Tomato soup', 
            ],




            [
                'color_theme_id' => 4, 
                'fill_id' => 1, 
                'code' => '735320', 
                'name' => 'Toffee', 
            ],
            [
                'color_theme_id' => 4, 
                'fill_id' => 2, 
                'code' => 'c29385', 
                'name' => 'Pork Chop', 
            ],
            [
                'color_theme_id' => 4, 
                'fill_id' => 3, 
                'code' => 'ba5d4b', 
                'name' => 'Pepperoni', 
            ],
            [
                'color_theme_id' => 4, 
                'fill_id' => 4, 
                'code' => 'd65077', 
                'name' => 'Lipstick', 
            ],
            [
                'color_theme_id' => 4, 
                'fill_id' => 5, 
                'code' => 'feb2da', 
                'name' => 'Ballerina', 
            ],
            [
                'color_theme_id' => 4, 
                'fill_id' => 6, 
                'code' => 'f9d4ea', 
                'name' => 'Spun Sugar', 
            ],
            [
                'color_theme_id' => 4, 
                'fill_id' => 7, 
                'code' => 'cec1d9', 
                'name' => 'Shadow Flower', 
            ],
            [
                'color_theme_id' => 4, 
                'fill_id' => 8, 
                'code' => 'dadffe', 
                'name' => 'Dream Sound', 
            ],
            [
                'color_theme_id' => 4, 
                'fill_id' => 9, 
                'code' => 'd0aef1', 
                'name' => 'Cadillac', 
            ],
            [
                'color_theme_id' => 4, 
                'fill_id' => 10, 
                'code' => '6a780c', 
                'name' => 'Army', 
            ],
            [
                'color_theme_id' => 4, 
                'fill_id' => 11, 
                'code' => 'b4cb24', 
                'name' => 'Kiwi Fruit',
            ],
            [
                'color_theme_id' => 4,
                'fill_id' => 12,
                'code' => 'dfff2c',
                'name' => 'Slime',
            ],
            [
                'color_theme_id' => 4,
                'fill_id' => 13,
                'code' => 'f9f85a',
                'name' => 'Harvest',
            ],
            [
                'color_theme_id' => 4,
                'fill_id' => 14,
                'code' => 'fcfbb5',
                'name' => 'Legal Pad',
            ],
        ];

        collect($colors)->each(function($color){ Color::create($color); });
    }
}
