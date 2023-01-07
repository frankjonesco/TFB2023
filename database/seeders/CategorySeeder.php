<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::on('mysql_import')->get();

        foreach($categories as $category){

            Category::create([
                'hex' => $category->hex,
                'user_id' => $category->user_id,
                'sector_id' => $category->sector_id,
                'name' => $category->name,
                'slug' => $category->slug,
                'english_name' => $category->english_name,
                'english_slug' => $category->english_slug,
                'description' => $category->description,
                'image' => $category->image,
                'color_fill_id' => $category->color_fill_id,
                'created_at' => $category->created_at,
                'updated_at' => $category->updated_at,
                'status' => $category->status
            ]);
            
        }

    }
}
