<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $industries = [
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_id' => 2,
                'name' => 'Dairy products',
                'slug' => 'dairy-products',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_id' => 2,
                'name' => 'Animal feed',
                'slug' => 'animal-feed',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_id' => 3,
                'name' => 'Car rental',
                'slug' => 'car-rental',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_id' => 3,
                'name' => 'Tyre manufactoring',
                'slug' => 'tyre-manufucturing',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_id' => 2,
                'name' => 'Wholesale autoparts',
                'slug' => 'wholesale-autoparts',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_id' => 1,
                'name' => 'Retail',
                'slug' => 'retail',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_id' => 1,
                'name' => 'Cable production',
                'slug' => 'cable-production',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_id' => 1,
                'name' => 'Lighting',
                'slug' => 'lighting',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_id' => 4,
                'name' => 'Restaurant chain',
                'slug' => 'restaurant-chain',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_id' => 4,
                'name' => 'Confectionery',
                'slug' => 'Confectionery',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_id' => 4,
                'name' => 'Food hygiene',
                'slug' => 'food-hygiene',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_id' => 5,
                'name' => 'Steel production',
                'slug' => 'steel-production',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_id' => 5,
                'name' => 'Car tyres',
                'slug' => 'car-tyres',
                'status' => 'public'
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_id' => 5,
                'name' => 'Packaging',
                'slug' => 'packaging',
                'status' => 'public'
            ],
            
            
        ];
        
        collect($industries)->each(function ($industry) { Industry::create($industry); });
    }
}
