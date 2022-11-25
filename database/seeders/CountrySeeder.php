<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Support\Str;
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
        // Import countries
        $countries = Country::on('mysql_import')->get();

        // Create countries
        foreach($countries as $country) {
            Country::create([
                'name' => $country->nicename,
                'slug' => Str::slug($country->nicename),
                'iso' => $country->iso,
                'phone_code' => $country->phonecode
            ]);
        }
    }
}
