<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showSingleProduct($slug)
    {
        $product = Bike::where('status', true)->where('slug', $slug)->first();
        return view('frontend.single', compact('product'));
    }
}