<?php

namespace Database\Seeders;

use App\Models\Site;
use App\Models\Industry;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Import industries
        $industries = Industry::on('mysql_import')->where('category_id', '!=', null)->get();

        // Create industries
        foreach($industries as $industry){
            $site = new Site();
            $slug = $site->slug($industry->name);
            $english_slug = $site->slug($industry->english_name);

            $ids = [1,2,3,4];
            $random_user_id = $ids[array_rand($ids)];
            
            Industry::create([
                'old_id' => $industry->id,
                'hex' => Str::random(11),
                'user_id' => $random_user_id,
                'name' => trim($industry->name),
                'slug' => $slug,
                'english_name' => trim($industry->english_name),
                'english_slug' => $english_slug,
                'description' => $industry->description,
                'created_at' => date('Y-m-d H:i:s', $industry->created),
                'status' => 'public',
            ]);
        }

    }
}
