<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class Articles extends Seeder
{
   
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            DB::table('articles')->insert([
                'Titlw' => $faker->sentence,
                'content' => $faker->paragraph,
                'DateAdd' => NOW()
            ]);
        }
    }
}