<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsors = [
            [
                'hex' => Str::random(11),
                'name' => 'PricewaterhouseCoopers',
                'slug' => 'pwc',
                'logo' => 'pricewaterhousecoopers.png',
                'active' => 1
            ],
            [
                'hex' => Str::random(11),
                'name' => 'Matchbird',
                'slug' => 'matchbird',
                'logo' => 'matchbird.png',
                'active' => 1
            ],
            [
                'hex' => Str::random(11),
                'name' => 'Headgate',
                'slug' => 'headgate',
                'logo' => 'headgatea.png',
                'active' => 1
            ]
        ];

        collect($sponsors)->each(function($sponsor){ Sponsor::create($sponsor); });
    }
}
