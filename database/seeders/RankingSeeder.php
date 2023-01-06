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
        $rankings = Ranking::on('mysql_import')->get();

        foreach($rankings as $ranking){     

            Ranking::insert([
                'hex' => $ranking->hex,
                'user_id' => $ranking->user_id,
                'company_id' => $ranking->company_id,
                'year' => $ranking->year,
                'is_latest' => $ranking->is_latest,
                'turnover' => $ranking->turnover,
                'employees' => $ranking->employees,
                'training_rate' => $ranking->training_rate,
                'confirmed_by_company' => $ranking->confirmed_by_company,
                'note' => $ranking->note,
                'created_at' => $ranking->created_at,
                'updated_at' => $ranking->updated_at
            ]);

        }

    }

}
