<?php

namespace Database\Seeders;

use App\Models\Company;
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
        $companies = Company::on('mysql_import')->get();

        foreach($companies as $company){

            Company::insert([
                'hex' => $company->hex,
                'user_id' => $company->user_id,
                'registered_name' => $company->registered_name,
                'trading_name' => $company->trading_name,
                'slug' => $company->slug,
                'parent_organization' => $company->parent_organization,
                'description' => $company->description,
                'website' => $company->website,
                'image' => $company->image,
                'founded_in' => $company->founded_in,
                'family_business' => $company->family_business,
                'family_name' => $company->family_name,
                'family_generations' => $company->family_generations,
                'family_executive' => $company->family_executive,
                'female_executive' => $company->female_executive,
                'stock_listed' => $company->stock_listed,
                'matchbird_partner' => $company->matchbird_partner,
                'mail_blacklist' => $company->mail_blacklist,
                'address_number' => $company->address_number,
                'address_street' => $company->address_street,
                'address_city' => $company->address_city,
                'address_state' => $company->address_state,
                'address_zip' => $company->address_zip,
                'address_country' => $company->address_country,
                'address_phone' => $company->address_phone,
                'views' => $company->views,
                'locked' => $company->locked,
                'created_at' => $company->created_at,
                'updated_at' => $company->updated_at,
                'tofam_status' => $company->tofam_status,
                'status' => $company->status
            ]);

        }

    }
}
