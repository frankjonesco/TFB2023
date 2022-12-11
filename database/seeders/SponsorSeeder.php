<?php

namespace Database\Seeders;

use App\Models\Site;
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
                'show_in_navbar' => true,
                'url' => 'https://www.pwc.com/',
                'active' => 1
            ],
            [
                'hex' => Str::random(11),
                'name' => 'Matchbird',
                'slug' => 'matchbird',
                'logo' => 'matchbird.png',
                'show_in_navbar' => true,
                'url' => 'https://matchbird.com/',
                'active' => 1
            ],
            [
                'hex' => Str::random(11),
                'name' => 'Headgate',
                'slug' => 'headgate',
                'logo' => 'headgate.png',
                'url' => 'https://head-gate.de/',
                'active' => 1
            ],
            [
                'hex' => Str::random(11),
                'name' => 'Top Family Business',
                'slug' => 'top-family-business',
                'logo' => 'top-family-business.png',
                'active' => 1
            ]
        ];

        collect($sponsors)->each(function($sponsor){ Sponsor::create($sponsor); });

        // HANDLE IMAGE TRANSFER
        $site = new Site();
        $site->handleImageTransfer('companies', Sponsor::all());
    }
}
