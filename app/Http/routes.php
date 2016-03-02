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

//Route::get('dataInput/{data}',["as"=>"Input", function($data){
//
//    return "你輸入的是:$data";
//
//}]);
Route::get('dataInputOption/{data?}',["as"=>"dataInputOption",  function($data = null){

    return "你輸入的是:$data";

}]);
   Route::get('dataInputMulti/{data} - {data2}', ["as"=>"dataInputMulti", function($data,$data2){

    return "你輸入的是:$data , $data2";

}]);

   Route::get('API/user_id={users_id}',["as" => "API/user_id=",function($users_id){//"as" => "API"設定暱稱 function設定變數

       return \App\Models\Myuser::find($users_id); //找uses_id顯示出資訊
//        return \App\Models\User::all()->where('email','like','%');//找出指定位置顯示出來
//          return \App\Models\User::all();//顯示全部資料
   }]);

   Route::get('API/all',["as" => "API/all",function(){//"as" => "API"設定暱稱 function設定變數

        return \App\Models\Myuser::all();//找出指定位置顯示出來

   }]);



   Route::get('API/email',["as" => "API/email",function(){//"as" => "API"設定暱稱 function設定變數

//   return \App\Models\User::where('email','like','%yahoo%')->get();

//   return \App\Models\User::where('email','like','%yahoo%')->get()->toJson();//找出指定email關鍵字,將位置用json顯示出來
  return \App\Models\Myuser::where('email','like','%gmail%')->orderBy('email','asc')->get();//desc從大到小排序   //asc從小到大排序
//     return \App\Models\User::where('email','like','%yahoo%')->get()->count(); //顯示第幾筆資料

   }]);
   Route::get('API/fileUpLoad',function(){

       return view('fileUpLoad');

   });
//Route::group(['prefix' => 'API/'], function(){
//    $email = 'ggxx@gmail.com';
//    $password ='ggxx0926';
//
//    if(Auth::attempt)
//
//});
Route::get('API/getPhotosFrom({user})', ["as" => "API/all", function ($user) {

    return App\Models\Myuser::where('users_name','=',$user)->photos()->get();
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
//Route::Post('API/login',function(){
//
//   try{
//
//       $user = Sentry::authenticate(Input::all(), false); //驗證user資料
//       $token = hash('sha256',Str::random(60),false); //產生隨機編碼放入token
//       $user->api_token = $token;
//       $user->save();
//
//       return Response::json(array('token' =>$token,'user'=>$user->toArray()));
//   }
//    catch(exception $e)
//    {
//        App::abort(404,$e->getMessage());
//    }
//});
Route::Get('API/login/{email}/{password}',function($email,$password){
    $credentials = array(
    'email' => $email,
    'password' =>$password,

    );
    if(Auth::once($credentials)){

       $token = hash('sha256',Str_random(60),false); //產生隨機編碼放入token
       $user = Auth::user();//取得user model
       $user->api_token = $token;
       $user->save();

       return Response::json(array('token' =>$token,'user'=>$user->toArray()));
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




Route::group(['middleware' => 'auth:api'], function () {


    Auth::guard('api')->user();

    Route::get("API/user_token", ["as" =>"API:user_token", function($data){

        $token = Auth::getTokenForRequest();

        return "user api_token:$token";

    }]);

    Route::get("dataInput/{data}", ["as" =>"Input", function($data){

        return "你輸入的是:$data";
    }]);
});
Route::group(['middleware' => 'web'], function () {
    Route::auth();

        Route::get("dataInput/{data}", ["as" =>"Input", function($data){

        return "你輸入的是:$data";
    }]);
    Route::get('/home', 'HomeController@index');

    Route::get('API/PhotosFrom{user}','apiController@photosFromUser');//變數直接傳到 controller 的函式中處理

    Route::get('API/{user}FromPhotos', 'apiController@userFromPhotos');
});
