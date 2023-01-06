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
                'sector_id' => null,
                'name' => 'Acquisitions',
                'slug' => 'acquisitions',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_id' => null,
                'name' => 'Shareholdings',
                'slug' => 'shareholdings',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_id' => null,
                'name' => 'Innovation',
                'slug' => 'innovation',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_id' => null,
                'name' => 'Sustainability',
                'slug' => 'sustainability',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_id' => null,
                'name' => 'Resignations',
                'slug' => 'resignations',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_id' => null,
                'name' => 'Growth',
                'slug' => 'growth',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_id' => null,
                'name' => 'Decline',
                'slug' => 'decline',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_id' => null,
                'name' => 'Tolerance',
                'slug' => 'tolerance',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_id' => null,
                'name' => 'Investments',
                'slug' => 'investments',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_id' => null,
                'name' => 'Partnerships',
                'slug' => 'partnerships',
                'status' => 'public'
            ],
        ];

        collect($categories)->each(function($category){ Category::create($category);});
    }
}
