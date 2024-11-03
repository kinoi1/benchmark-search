<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class ArticleSeeder extends Seeder
{
   
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            DB::table('articles')->insert([
                'Title' => $faker->sentence,
                'content' => $faker->paragraph,
                'DateAdd' => NOW()
            ]);
        }
    }
}