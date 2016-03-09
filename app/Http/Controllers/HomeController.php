<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Mail;
use DB;
use File;
use Storage;
use response;
use Illuminate\Contracts\Routing\ResponseFactory;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function data(Request $dat){
//             $email = $dat->email;
//            $pass = $dat->pwd;
//
//            DB::table('users')->insert([
//                    'email' => $email,
//                    'password' => $pass,
//
//            ]);
            echo '成功登入';
        }
    public function create()
  {
    if( Auth::check() ) return Redirect::to("/admin");

    return View::make("sessions.create");
  }


}
