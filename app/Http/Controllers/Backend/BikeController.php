<?php

namespace App\Http\Controllers\Backend;

use App\Models\Bike;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('app.bikes.index');
        $bikes = Bike::select('id', 'title','price_per_day','discount_price', 'status', 'booked_status')
                ->orderBy('id', 'DESC')
                ->get();
        return view('backend.bike.index', compact('bikes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.bikes.create');
        $brands = Brand::select('id', 'name')->get();
        $parentCategories = Category::select('id', 'name')
                    ->with('subcategory')
                    ->whereNull('parent_id')
                    ->get();

        return view('backend.bike.form', compact('brands', 'parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('app.bikes.create');
        $bike = Bike::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'title' => $request->title,
            'model' => $request->model,
            'price_per_day' => $request->price_per_day,
            'discount_price' => $request->discount_price,
            'description' => $request->description,
            'status' => $request->filled('status'),
            'user_status' => true
        ]);

        // upload images
        if ($request->hasFile('bike_image')) {
            $fileName = rand() . time() . '.' . $request->file('bike_image')->extension();
            $bike->addMedia($request->file('bike_image'))
                ->usingFileName($fileName)
                ->toMediaCollection('bike_image');
        }
        notify()->success('Product created successfully.', 'Added');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function show(Bike $bike)
    {
        Gate::authorize('app.bikes.create');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function edit(Bike $bike)
    {
        Gate::authorize('app.bikes.edit');
        $brands = Brand::select('id', 'name')->get();
        $parentCategories = Category::select('id', 'name')->get();
        return view('backend.bike.form', compact('bike', 'brands', 'parentCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bike $bike)
    {
        Gate::authorize('app.bikes.edit');
        $bike->update([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'title' => $request->title,
            'model' => $request->model,
            'price_per_day' => $request->price_per_day,
            'discount_price' => $request->discount_price,
            'description' => $request->description,
            'status' => $request->filled('status'),
            'user_status' => true
        ]);

        // upload images
        if ($request->hasFile('bike_image')) {
            $fileName = rand() . time() . '.' . $request->file('bike_image')->extension();
            $bike->addMedia($request->file('bike_image'))
                ->usingFileName($fileName)
                ->toMediaCollection('bike_image');
        }
        notify()->success('Product updated successfully.', 'Added');
        return back();
    }

    /**
     * Product active logic
     *
     * @param  mixed $product
     * @return void
     */
    public function active(Bike $bike)
    {
        $bike->update([
            'status' => true
        ]);
        notify()->success('Product active successfully.', 'Activated');
        return back();
    }

    /**
     * Product deactive logic
     *
     * @param  mixed $product
     * @return void
     */
    public function deactive(Bike $bike)
    {
        $bike->update([
            'status' => false
        ]);
        notify()->success('Product deactive successfully.', 'Dectivated');
        return back();
    }

     /**
     * Product active logic
     *
     * @param  mixed $product
     * @return void
     */
    public function available(Bike $bike)
    {
        $bike->update([
            'booked_status' => true
        ]);
        notify()->success('Product active successfully.', 'Activated');
        return back();
    }

    /**
     * Product deactive logic
     *
     * @param  mixed $product
     * @return void
     */
    public function booked(Bike $bike)
    {
        $bike->update([
            'booked_status' => false
        ]);
        notify()->success('Product deactive successfully.', 'Dectivated');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bike $bike)
    {
        Gate::authorize('app.bikes.destroy');
        $bike->delete();
        notify()->success('Product deleted', 'Success');
        return back();
    }
}