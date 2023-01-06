<?php

namespace Database\Seeders;

use App\Models\Map;
use App\Models\Sector;
use App\Models\Company;
use App\Models\Industry;
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
        $maps = Map::on('mysql_import')->get();

        foreach($maps as $map){
            
            Map::create([
                'hex' => $map->hex,
                'sector_id' => $map->sector_id,
                'industry_id' => $map->industry_id,
                'company_id' => $map->company_id
            ]);

        }

    }
        
}
