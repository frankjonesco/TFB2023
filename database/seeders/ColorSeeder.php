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
        $colors = Color::on('mysql_import')->get();

        foreach($colors as $color){

            Color::create([
                'color_theme_id' => $color->color_theme_id,
                'fill_id' => $color->fill_id,
                'code' => $color->code,
                'tailwind_class' => $color->tailwind_class,
                'name' => $color->name,
                'created_at' => $color->created_at,
                'updated_at' => $color->updated_at
            ]);

        }

    }
}
