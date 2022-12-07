<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SectorIndustryCompanyMap;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SectorIndustryCompanyMapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sector_industry_company_maps = [
            [
                'sector_industry_map_id' => 1,
                'company_id' => 239
            ]
        ];

        foreach($sector_industry_company_maps as $sector_industry_company_map){
            SectorIndustryCompanyMap::insert($sector_industry_company_map);
        }
    }
}
