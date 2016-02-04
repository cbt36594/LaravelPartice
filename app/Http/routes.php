<?php
//use Request;
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', ["as"=>"home",function () {  //  /代表首頁


    return view('index');}
                ]
          );
Route::get('about', ["as"=>"about",function () {   //about在resources的views下檔名


    return view('about');}
                ]
          );
Route::get('blog', ["as"=>"blog",function () {


    return view('blog');}
                ]
          );
Route::get('contact', ["as"=>"contact",function () {


    return view('contact');}
                ]
          );
Route::get('vendorWelcome', ["as"=>"vendorWelcome",function () {


    return view('vendor/vendorWelcome');}
                ]
          );
Route::get('subLayout',function(){

    return view('subLayout');}
 );

//Route::get('/', ["as"=>"home",function () {
//
//
//    return view('welcome');}
//                ]
//          );

Route::get('dataInput/{data}',["as"=>"Input", function($data){

    return "你輸入的是:$data";

}]);
Route::get('dataInputOption/{data?}',["as"=>"dataInputOption",  function($data = null){

    return "你輸入的是:$data";

}]);
   Route::get('dataInputMulti/{data} - {data2}', ["as"=>"dataInputMulti", function($data,$data2){

    return "你輸入的是:$data , $data2";

}]);

   Route::get('API/user_id={users_id}',["as" => "API/user_id=",function($users_id){//"as" => "API"設定暱稱 function設定變數

       return \App\Models\User::find($users_id); //找uses_id顯示出資訊
//        return \App\Models\User::all()->where('email','like','%');//找出指定位置顯示出來
//          return \App\Models\User::all();//顯示全部資料
   }]);

   Route::get('API/all',["as" => "API/all",function(){//"as" => "API"設定暱稱 function設定變數

        return \App\Models\User::all();//找出指定位置顯示出來

   }]);



   Route::get('API/email',["as" => "API/email",function(){//"as" => "API"設定暱稱 function設定變數

//   return \App\Models\User::where('email','like','%yahoo%')->get();

//   return \App\Models\User::where('email','like','%yahoo%')->get()->toJson();//找出指定email關鍵字,將位置用json顯示出來
  return \App\Models\User::where('email','like','%gmail%')->orderBy('email','asc')->get();//desc從大到小排序   //asc從小到大排序
//     return \App\Models\User::where('email','like','%yahoo%')->get()->count(); //顯示第幾筆資料

   }]);
   Route::get('API/fileUpLoad',function(){

       return view('fileUpLoad');

   });
   Route::get('API/PhotosFrom{user}',["as" => "API/all",function($user){
       $photos = APP\Models\User::where('user_name','=',$user)->first()->photos;

       return $photos;

   }]);
   Route::post('API/fileUpLoadGo',function(){

//       $file = Request::input('user_file');

//              $fileName = \Carbon\Carbon::now().".".Request::file('user_file')->getClientOriginalExtension();//將檔名變成上傳時間now()
//            $fileName =str_replace(":","-",$fileName);
//            $fileName =str_replace(" ","-",$fileName);

       if(Request::hasFile('user_file'))
       {
           if(Request::file('user_file')->isValid())//判斷上傳檔案是否正常
           {

//               Request::file('user_file')->move(".",$fileName);//將上傳的檔案移到public資料牙
               $fileName = Request::file('user_file')->getRealPath();
               $image = Image::make($fileName)->encode('jpg',100);//將圖片轉譯存入變數image
               $datas = \App\Models\Data::find(1);
               $datas->data = $image;
               $datas->save();
//           return view('fileUploadSucces',['user_file'=>$fileName]);//上傳的圖片顯示在網頁

               $datas = \APP\Models\Data::find(1);
               $response = Response::make($datas->data,200);
               $response->header('Content-Type','image/jpeg');//設定網頁資料格式
               return $response;
           }else {

           return "上傳失敗";
                 }


       }else{

           return "上傳失敗";
       }


   });

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {  //web改api即可連APP

});
