<?php

namespace Database\Seeders;

use App\Models\Sector;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sectors = [
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'name' => 'Electronics',
                'slug' => 'electronics',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'name' => 'Agriculture',
                'slug' => 'agriculture',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'name' => 'Automotive',
                'slug' => 'automotive',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'name' => 'Food & Drink',
                'slug' => 'food-and-drink',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'name' => 'Manufactoring',
                'slug' => 'manufactoring',
                'status' => 'public'
            ]
        ];
        
        collect($sectors)->each(function ($sector) { Sector::create($sector); });
    }
}
