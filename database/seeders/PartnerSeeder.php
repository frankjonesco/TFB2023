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
        $partners = Partner::on('mysql_import')->get();

        foreach($partners as $partner){
            
            Partner::create([
                'hex' => $partner->hex,
                'article_id' => $partner->article_id,
                'name' => $partner->name,
                'slug' => $partner->slug,
                'logo' => $partner->logo,
                'show_in_navbar' => $partner->show_in_navbar,
                'show_in_footer' => $partner->show_in_footer,
                'link' => $partner->link,
                'created_at' => $partner->created_at,
                'updated_at' => $partner->updated_at,
                'active' => $partner->active
            ]);

        }

    }
    
}
