<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\wishlist;

use Auth;


use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth' , ['except'=>['index','retail']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        Session::put('customer','This is wholesale session');
        Auth::logout();
        return view('main');
    }


    public function retail()
    {
        
        Session::forget('customer');
         return redirect()->route('landing-page');
    }

    public function wholesale()
    {
        Session::put('customer','This is wholesale session');
        return redirect()->route('landing-page');
    }


}