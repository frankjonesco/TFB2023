<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyIndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pivots = [
            [
                'sector_id' => 9, 
                'industry_id' => 2,
                'company_id' => 239    
            ]
        ];
    }
}
