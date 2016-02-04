<?php

use Illuminate\Database\Seeder;
use \Carbon\Carbon; //使用套件的路徑
use \App\Models\User;//使用Models路徑

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Myuser::truncate();//呼叫類別


        $faker = \Faker\Factory::create('zh_TW');//假資料套件

        foreach(range(1,10) as $number){//建立隨機變數數值

            $user = new User;
            $user->users_name = $faker->name;
            $user->email =$faker->email;
            $user->save();
        }
    }
}
