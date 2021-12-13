<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::where('status', true)->get();
        $products = Bike::where('status', true)->get();
        return view('frontend.home', compact('sliders', 'products'));
    }
}
