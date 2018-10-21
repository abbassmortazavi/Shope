<?php

namespace App\Http\Controllers;

use App\ActivationCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
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

    public function setCookie(Request $request){
       Cookie::queue('test' , 'value' , 1000);
    }
    public function getCookie(Request $request){
        $value = $request->cookie('test');
        echo $value;
    }

    public function activation($token)
    {
        $activationCode = ActivationCode::whereCode($token)->first();
       switch ($activationCode){
           case ! $activationCode:
               dd('not exist!!');
               return redirect('/');
               break;
           case ($activationCode->expire < Carbon::now()):
               dd('expire');
               return redirect('/');
               break;
           case ($activationCode->used == 1):
               dd('used');
               return redirect('/');
       }

       $activationCode->update([
           'used' => true
       ]);

       $activationCode->user->update([
           'active' => 1
       ]);

       auth()->loginUsingId($activationCode->user->id);
       return redirect(route('admin.panel'));

    }
}
