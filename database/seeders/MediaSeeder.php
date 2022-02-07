<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,10) as $value){
            DB::table('media')->insert([
                'image_path' => $faker->image(),
                'extension'=>$faker->fileExtension(),
                'file_size'=>mt_rand(111,999)
            ]);
        }
    }
}
