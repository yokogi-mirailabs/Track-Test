<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recipe;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $testData = [
        //     [
        //         1,
        //         'チキンカレー',
        //         '45分',
        //         '4人',
        //         '玉ねぎ,肉,スパイス',
        //         1000,
        //         '2016-01-10 12:10:12',
        //         '2016-01-10 12:10:12'
        //     ],
        //     [
        //         2,
        //         'オムライス',
        //         '30分',
        //         '2人',
        //         '玉ねぎ,卵,スパイス,醤油',
        //         700,
        //         '2016-01-11 13:10:12',
        //         '2016-01-11 13:10:12'
        //     ]
        // ];

        // Recipe::insert($testData);
        Recipe::create([
            'title' => 'チキンカレー',
            'making_time' => '45分',
            'serves' => '4人',
            'ingredients' => '玉ねぎ,肉,スパイス',
            'cost' => 1000,
            'created_at' => '2016-01-10 12:10:12',
            'updated_at' => '2016-01-10 12:10:12'
        ]);
        Recipe::create([
            'title' => 'オムライス',
            'making_time' => '30分',
            'serves' => '2人',
            'ingredients' => '玉ねぎ,卵,スパイス,醤油',
            'cost' => 700,
        ]);
    }
}
