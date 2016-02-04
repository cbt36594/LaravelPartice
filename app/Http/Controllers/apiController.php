<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class apiController extends Controller
{

    public function __construct(){//為整個 controller 增加認證機制

      $this->middleware('auth');

    }
    public function photosFromUser($user)//等同之前寫在 route 時的匿名函式（閉包）
    {



       $datas = \App\Models\Myuser::where('users_name','=',$user)->first()->datas;

       return view('photoFromUser',['datas'=>$datas]);

   }


    public function userFromPhotos($user)
    {

      $user = \App\Models\Data::where('user_name','=',$user)->first()->myusers;

    return view('userFromPhoto',['data' => $user]);

        }



    }
