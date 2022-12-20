<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use App\Models\Ranking;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RankingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Import rankings
        $rankings = Ranking::on('mysql_import')->get();

        // Foreach rankings
        foreach($rankings as $ranking){

            $company = Company::where('old_id', $ranking->company_id)->first();
            $company_id = $company ? $company->id : null; 

            $user = User::where('old_id', $ranking->user_id)->first();
            $user_id = $user ? $user->id : 1; 
            
            // Create ranking
            Ranking::insert([
                'old_id' => $ranking->id,
                'hex' => Str::random(11),
                'user_id' => $user_id,
                'company_id' => $company_id,
                'year' => $ranking->year,
                'is_latest' => $ranking->latest,
                'turnover' => $ranking->turnover,
                'employees' => $ranking->employees,
                'training_rate' => $ranking->training_rate,
                'confirmed_by_company' => $ranking->source,
                'note' => 'From 2022 transfer (v3 to v4)',
                'created_at' => date('Y-m-d H:i:s', $ranking->created),
                'updated_at' => date('Y-m-d H:i:s', $ranking->updated)
            ]);
        }
    }
}
