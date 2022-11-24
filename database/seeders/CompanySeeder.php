<?php

namespace Database\Seeders;

use App\Models\Company;
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
        $companies = [
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_ids' => '2',
                'industry_ids' => '2,4',
                'registered_name' => 'Expo Enterprise',
                'trading_name' => 'Expo',
                'slug' => 'expo-enterprise',
                'status' => 'public',
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_ids' => '4',
                'industry_ids' => '4,12,3',
                'registered_name' => 'Mighty Mouthfulls',
                'trading_name' => '',
                'slug' => 'mighty-mouthfulls',
                'status' => 'public',
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_ids' => '3',
                'industry_ids' => '15.5',
                'registered_name' => 'Golden Acres',
                'trading_name' => 'G-Acres',
                'slug' => 'golden-acres',
                'status' => 'public',
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_ids' => '1',
                'industry_ids' => '3,9,12',
                'registered_name' => 'All Town Rocords',
                'trading_name' => 'ATR',
                'slug' => 'all-town-records',
                'status' => 'public',
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'sector_ids' => '4',
                'industry_ids' => '12,2',
                'registered_name' => 'Rainbow Sounds',
                'trading_name' => '',
                'slug' => 'rainbow-sounds',
                'status' => 'public',
            ],
        ];

        collect($companies)->each(function ($company) { Company::create($company); });
    }
}
