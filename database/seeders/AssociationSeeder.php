<?php

namespace Database\Seeders;

use App\Models\Association;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AssociationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $associations = Association::on('mysql_import')->get();

        foreach($associations as $association){

            Association::create([
                'user_id' => $association->user_id,
                'article_id' => $association->article_id,
                'company_id' => $association->company_id
            ]);
            
        }

    }
}
