<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Session;
use App\Slideshow;
use App\Homepageimage;

class LandingPageController extends Controller
{

    public function __construct()
    {
        if(Session::has('customer'))
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response


     */
    public function index()
    {   

        if(Session::has('customer'))
        $products = Product::where('featured', true)->where('wholesale',true)->take(8)->inRandomOrder()->get();
        else
        $products = Product::where('featured', true)->where('retail',true)->take(8)->inRandomOrder()->get();

        $slides= Slideshow::all();
        $homebanners = Homepageimage::all();

        return view('landing-page')->with([
            'products' => $products,
            'slides' => $slides,
            'homebanners' => $homebanners,
        ]);
    }
}
