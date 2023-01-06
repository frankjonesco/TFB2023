<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use App\Models\Company;
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
        // Import associations
        $associations = Association::on('mysql_import')->get();

        // Foreach associations
        foreach($associations as $association){

            // User ID
            $user_id = 1;

            // Article ID
            $article = Article::where('old_id', $association->article_id)->first();
            $article_id = $article ? $article->id : null; 

            // Company ID
            $company = Company::where('old_id', $association->company_id)->first();
            $company_id = $company ? $company->id : null; 

            // Create association
            Association::create([
                'user_id' => $user_id,
                'article_id' => $article_id,
                'company_id' => $company_id
            ]);
        }
    }
}
