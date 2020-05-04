<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => '食事',
                'slug' => 'meal'
            ],
            [
                'id' => 2,
                'name' => '飼育環境',
                'slug' => 'environment'
            ],
            [
                'id' => 3,
                'name' => '掃除',
                'slug' => 'clean'
            ],
            [
                'id' => 4,
                'name' => 'ふれあい',
                'slug' => 'play'
            ],
            [
                'id' => 5,
                'name' => '健康',
                'slug' => 'health'
            ],
        ]);
       
    }
}
