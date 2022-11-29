<?php

namespace Database\Seeders;

use App\Models\Site;
use App\Models\Sector;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Import sectors (previously named 'categories')
        $sectors = Category::on('mysql_import')->get();

        // Create sectors
        foreach($sectors as $sector){
            $site = new Site();
            $slug = $site->slug($sector->name);
            $english_slug = $site->slug($sector->english_name);
            
            Sector::create([
                'old_id' => $sector->id,
                'hex' => Str::random(11),
                'user_id' => 1,
                'name' => trim($sector->name),
                'slug' => $slug,
                'english_name' => trim($sector->english_name),
                'english_slug' => $english_slug,
                'description' => null,
                'image' => $sector->image,
                'color_id' => $sector->color,
                'created_at' => date('Y-m-d H:i:s', $sector->created),
                'status' => 'public'
            ]);
        }

        // HANDLE IMAGE TRANSFER
        $site = new Site();
        
        $site->handleImageTransfer('sectors', Sector::all());
    }
}
