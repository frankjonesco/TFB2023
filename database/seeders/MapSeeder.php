<?php

namespace Database\Seeders;

use App\Models\Map;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maps = [
            [
                'hex' => Str::random(11),
                'sector_id' => 9,
                'industry_id' => 2,
                'company_id' => 239
            ]
        ];

        foreach($maps as $map){
            Map::insert($map);
        }
    }
}
