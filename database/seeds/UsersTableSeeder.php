<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); //外部キー制約を一旦無視する
        $faker = Faker\Factory::create('ja_JP');
        DB::table('users')->insert([
            'id' => 1,
            'role_id' => 1,
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        for($i=2;$i<=15;$i++){
            DB::table('users')->insert([
                'id' => $i,
                'role_id' => 1,
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $faker->password,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); //外部キー制約の無視を戻す
    }
}
