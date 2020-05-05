<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ja_JP');
        for($i=1;$i<=15;$i++){
            DB::table('questions')->insert([
                'user_id' => 1,
                'text' => Str::random(20),
                'answer_flg' => 0,
                'title' => Str::random(10),
                'category_id' => $faker->numberBetween(1,5),	
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);
        }
    }
}
