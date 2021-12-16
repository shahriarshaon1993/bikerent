<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use App\Models\Category;
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
        $products = Bike::where('status', true)->where('user_status', true)->get();
        return view('frontend.home', compact('sliders', 'products'));
    }

    /**
     * searchig bike logic
     *
     * @return void
     */
    public function search(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

        $title = $request->title;
        $products = Bike::where('status', 1)
            ->where("title", "LIKE", "%{$title}%")
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('frontend.search', compact('products', 'title'));
    }

    /**
     * Search by category
     *
     * @param  mixed $slug
     * @return void
     */
    public function searchByCategories($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $products = Bike::where('category_id', $category->id)
                    ->where('status', true)->where('user_status', true)
                    ->get();
        $title = $category->name;
        return view('frontend.search', compact('products', 'title'));
    }
}
