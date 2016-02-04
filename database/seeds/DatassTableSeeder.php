<?php

use Illuminate\Database\Seeder;
use \Carbon\Carbon; //使用套件的路徑
use \App\Models\Data;//使用Models路徑
class DatassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Data::truncate();//清掉資料
        $faker = \Faker\Factory::create('zh_TW');

        foreach(range(1,10) as $number){//建立隨機變數數值
            $datas = new Data;
            $id = rand(1,10);
          $datas->user_name = \APP\Models\Myuser::find($id)->users_name;

//           $data->user_name = $faker->name;
//            $data->data;
            $datas->description = $faker->text;
            $datas->save();
        }
    }
}
