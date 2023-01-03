<?php

namespace Database\Seeders;

use App\Models\Site;
use App\Models\Partner;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partners = [
            [
                'old_id' => 1,
                'hex' => Str::random(11),
                'article_id' => 290,
                'name' => 'PricewaterhouseCoopers',
                'slug' => 'pwc',
                'logo' => 'pricewaterhousecoopers.png',
                'show_in_navbar' => true,
                'url' => 'https://www.pwc.com/',
                'active' => 1
            ],
            [
                'old_id' => 2,
                'hex' => Str::random(11),
                'article_id' => 136,
                'name' => 'Matchbird',
                'slug' => 'matchbird',
                'logo' => 'matchbird.png',
                'show_in_navbar' => true,
                'url' => 'https://matchbird.com/',
                'active' => 1
            ],
            [
                'old_id' => 3,
                'hex' => Str::random(11),
                'article_id' => 122,
                'name' => 'Headgate',
                'slug' => 'headgate',
                'logo' => 'headgate.png',
                'url' => 'https://head-gate.de/',
                'active' => 1
            ],
            [
                'old_id' => 4,
                'hex' => Str::random(11),
                'article_id' => 137,
                'name' => 'Top Family Business',
                'slug' => 'top-family-business',
                'logo' => 'top-family-business.png',
                'active' => 1
            ]
        ];

        collect($partners)->each(function($partner){ Partner::create($partner); });

        // HANDLE IMAGE TRANSFER
        $site = new Site();
        $site->handleImageTransfer('partners', Partner::all());
    }
}
