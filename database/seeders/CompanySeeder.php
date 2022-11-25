<?php

namespace Database\Seeders;

use App\Models\Site;
use App\Models\User;
use App\Models\Sector;
use App\Models\Company;
use App\Models\Category;
use App\Models\Industry;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySeeder extends Seeder
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
        foreach($companies as $company){

            // User ID
            $ids = [2,4];
            $random_user_id = $ids[array_rand($ids)];
            if($company->user_id != ''){
                $user = User::where('old_id', $company->user_id)->first();
                $user_id = $user ? $user->id : $random_user_id;
            }

            // Sector IDs
            $sector_ids = null;
            if($company->categories){
                $sector_ids = explode(',', $company->categories);
                foreach($sector_ids as $sector_id){
                    $sector_id = trim($sector_id);
                    $sector = Sector::where('old_id', $sector_id)->first();
                    if($sector){
                        $sector_ids[] = $sector->id;
                    }
                }
                if(count($sector_ids) > 0){
                    $sector_ids = implode(',', $sector_ids);
                }
                else{
                    $sector_ids = null;
                }
            }

            // Industry IDs
            $industry_ids = null;
            if($company->industries){
                $industry_ids = explode(',', $company->industries);
                foreach($industry_ids as $industry_id){
                    $industry_id = trim($industry_id);
                    $industry = Industry::where('old_id', $industry_id)->first();
                    if($industry){
                        $industry_ids[] = $industry->id;
                    }
                }
                if(count($industry_ids) > 0){
                    $industry_ids = implode(',', $industry_ids);
                }
                else{
                    $industry_ids = null;
                }
            }

            // Registerd name
            $registered_name = ($company->display_name != null) ? $company->display_name : $company->name;

            // Parent organisation
            $parent_organization = ($company->name == $company->display_name) ? null : $company->name;
            
            // Create company
            Company::create([
                'old_id' => $company->id,
                'hex' => Str::random(11),
                'user_id' => $user_id,
                'sector_ids' => $sector_ids,
                'industry_ids' => $industry_ids,
                'registered_name' => $registered_name,
                'trading_name' => $company->short_name,
                'parent_organization' => $parent_organization,
                'description' => $company->descr,
                'website' => $company->website,
                'image' => $company->logo,
                'founded_in' => $company->founded,
                'family_business' => $company->family_business,
                'family_name' => $company->family_name,
                'family_generations' => $company->family_generations,
                'family_executive' => $company->family_executive,
                'female_executive' => $company->woman_executive,
                'stock_listed' => $company->stock_exchange,
                'matchbird_partner' => $company->matchbird_partner,
                'mail_blacklist' => $company->mail_blacklist,
                'address_number' => $company->address_number,
                'address_street' => $company->address_street,
                'address_city' => $company->address_city,
                'address_state' => $company->address_state,
                'address_zip' => $company->address_zip,
                'address_country' => $company->address_country,
                'address_phone' => $company->address_telephone,
                'views' => $company->views,
                'locked' => $company->locked,
                'created_at' => date('Y-m-d H:i:s', $company->created),
                'updated_at' => date('Y-m-d H:i:s', $company->updated),
                'tofam_status' => $company->tofam_status,
                'status' => (($company->active == 1) && ($company->tofam_status == 'in')) ? 'public' : 'private'
            ]);
        }

        // HANDLE IMAGE TRANSFER
        $site = new Site();
        $site->handleImageTransfer('companies', Company::all(), 'lg-');
    }
}
