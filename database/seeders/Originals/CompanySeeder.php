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
            $ids = [1,2,3,4];
            $random_user_id = $ids[array_rand($ids)];
            if($company->user_id != ''){
                $user = User::where('old_id', $company->user_id)->first();
                $user_id = $user ? $user->id : $random_user_id;
            }           

            // Registerd name
            $registered_name = ($company->display_name != null) ? $company->display_name : $company->name;

            // Parent organisation
            $parent_organization = ($company->name == $company->display_name) ? null : $company->name;
            
            $site = new Site();

            // Create company
            Company::insert([
                'old_id' => $company->id,
                'hex' => Str::random(11),
                'user_id' => $user_id,
                'registered_name' => $registered_name,
                'trading_name' => $company->short_name,
                'slug' => $site->slug($company->short_name ?? $registered_name),
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
