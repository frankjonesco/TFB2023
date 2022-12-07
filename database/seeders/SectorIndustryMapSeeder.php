<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SectorIndustryMap;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SectorIndustryMapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sector_industry_maps = [
            [
                'sector_id' => 9,
                'industry_id' => 2
            ]
        ];

        foreach($sector_industry_maps as $sector_industry_map){
            SectorIndustryMap::insert($sector_industry_map);
        }
    }
}
