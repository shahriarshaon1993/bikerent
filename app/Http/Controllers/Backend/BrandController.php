<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandStoreRequest;
use App\Http\Requests\BrandUpdateRequest;
use Illuminate\Support\Facades\Gate;

class BrandController extends Controller
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
        $brands = Brand::select('id', 'name', 'updated_at')
                ->orderBy('id', 'DESC')
                ->get();
        return view('backend.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.bikes.create');
        return view('backend.brand.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandStoreRequest $request)
    {
        Gate::authorize('app.bikes.create');
        $productType = Brand::create([
            'name' => $request->name
        ]);

        // upload images
        if ($request->hasFile('brand_image')) {
            $fileName = rand() . time() . '.' . $request->file('brand_image')->extension();
            $productType->addMedia($request->file('brand_image'))
                ->usingFileName($fileName)
                ->toMediaCollection('brand_image');
        }
        notify()->success('Brand created successfully.', 'Added');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        Gate::authorize('app.bikes.edit');
        return view('backend.brand.form', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(BrandUpdateRequest $request, Brand $brand)
    {
        Gate::authorize('app.bikes.edit');
        $brand->update([
            'name' => $request->name
        ]);
        // upload images
        if ($request->hasFile('brand_image')) {
            $fileName = rand() . time() . '.' . $request->file('brand_image')->extension();
            $brand->addMedia($request->file('brand_image'))
                ->usingFileName($fileName)
                ->toMediaCollection('brand_image');
        }
        notify()->success('Brand update successfully.', 'Updated');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        Gate::authorize('app.bikes.destroy');
        $brand->delete();
        notify()->success('Brand deleted', 'Success');
        return back();
    }
}
