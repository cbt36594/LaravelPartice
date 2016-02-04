<?php

use Illuminate\Database\Seeder;
use \Carbon\Carbon; //使用套件的路徑
use \App\Models\Test;

class TestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ch = array('a','b','c','d');


        \App\Models\Test::truncate();
        $faker = \Faker\Factory::create('zh_TW');

        foreach(range(1,10) as $number){//建立隨機變數數值

//        \App\Models\Test::create([
//            'data'=>'seeder 輸入的',
//            'YesNo'     =>rand(0,1),
//            '數字'       =>$number,
//            '內容'       =>$faker->name,
//            '日期'       =>Carbon::now()->addDays($number)//用套件顯示日期,add是增加日期天數
//

//        ]);
            $test = new Test;
            $test->data = '物件化 輸入 with namespace';
            $test->save();


        }
    }
}
