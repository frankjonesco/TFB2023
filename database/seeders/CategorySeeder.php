<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
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
        $categories = [
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_id' => 2,
                'name' => 'Partnerships',
                'slug' => 'partnerships',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_id' => 3,
                'name' => 'Products',
                'slug' => 'products',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_id' => 3,
                'name' => 'Acquisitions',
                'slug' => 'acquisitions',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_id' => 4,
                'name' => 'Sustainable practices',
                'slug' => 'sustainable-practices',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_id' => 2,
                'name' => 'Innovation',
                'slug' => 'innovation',
                'status' => 'public'
            ],
        ];

        collect($categories)->each(function($category){ Category::create($category);});
    }
}
