<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = Country::on('mysql_import')->get();

        foreach($countries as $country) {

            Country::create([
                'name' => $country->name,
                'slug' => $country->slug,
                'iso' => $country->iso,
                'phone_code' => $country->phone_code
            ]);

        }

    }

}
