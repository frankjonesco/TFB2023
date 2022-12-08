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

        // Import companies
        $companies = Company::on('mysql_import')->get();

        // Create companies
        foreach($companies as $key => $company){

            $new_company_id = Company::where('old_id', $company->id)->first()->id;
            $companies[$key]['id'] = $new_company_id;
            
            // Sector IDs
            $new_sector_ids = null;
            if($company->categories){
                $sector_ids = explode(',', $company->categories);
                foreach($sector_ids as $sector_id){
                    $sector_id = trim($sector_id);
                    $sector = Sector::where('old_id', $sector_id)->first();
                    if($sector){
                        $new_sector_ids[] = $sector->id;
                    }
                    else{
                        $new_sector_ids = [];
                    }
                }
                if(count($new_sector_ids) > 0){
                    $new_sector_ids = implode(',', $new_sector_ids);
                }
                else{
                    $new_sector_ids = null;
                }
            }

            $companies[$key]['sectors'] = $new_sector_ids;


            // Industry IDs
            $new_industry_ids = null;
            if($company->industries){
                $industry_ids = explode(',', $company->industries);
                foreach($industry_ids as $industry_id){
                    $industry_id = trim($industry_id);
                    $industry = Industry::where('old_id', $industry_id)->first();
                    if($industry){
                        $new_industry_ids[] = $industry->id;
                    }else{
                        $new_industry_ids = [];
                    }
                }
                if(count($new_industry_ids) > 0){
                    $new_industry_ids = implode(',', $new_industry_ids);
                }
                else{
                    $new_industry_ids = null;
                }
            }

            $companies[$key]['industries'] = $new_industry_ids;

        }

        $maps = [];
        
        foreach($companies as $company){

            if(strpos($company->sectors, ',')){
                $sectors = explode(',', $company->sectors);
            }
            else{
                $sectors = [$company->sectors];
            }
            
            if($sectors){
                foreach($sectors as $sector){
                    
                    if(strpos($company->industries, ',')){
                        $industries = explode(',', $company->industries);
                    }
                    else{
                        $industries = [$company->industries];
                    }
                    
                    if($industries){
                        foreach($industries as $industry){
                            if(($industry != null) && ($sector != null)){
                                $maps[] = [
                                    [
                                        'hex' => Str::random(11),
                                        'sector_id' => $sector,
                                        'industry_id' => $industry,
                                        'company_id' => $company->id
                                    ]
                                ];
                            }
                            
                        }
                    }
                    else{
                        if($sector != null){
                            $maps[] = [
                                [
                                    'hex' => Str::random(11),
                                    'sector_id' => $sector,
                                    'industry_id' => null,
                                    'company_id' => $company->id
                                ]
                            ];
                        }
                    }
                }
            }else{
                if(strpos($company->industries, ',')){
                    $industries = explode(',', $company->industries);
                }
                else{
                    $industries = [$company->industries];
                }
                if($industries){
                    foreach($industries as $industry){
                        if($industry != null){
                            $maps[] = [
                                [
                                    'hex' => Str::random(11),
                                    'sector_id' => null,
                                    'industry_id' => $industry,
                                    'company_id' => $company->id
                                ]
                            ];
                        }
                    }   
                }
            }
            
  
        }
        
        foreach($maps as $map){
            Map::insert($map);
        }
    }
}
