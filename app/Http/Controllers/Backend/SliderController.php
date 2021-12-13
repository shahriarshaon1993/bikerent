<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SliderController extends Controller
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
        Gate::authorize('app.sliders.index');
        $sliders = Slider::select('id', 'title', 'status', 'updated_at')
                ->orderBy('id', 'DESC')
                ->get();
        return view('backend.sliders.index', compact('sliders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.sliders.create');
        return view('backend.sliders.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('app.sliders.create');
        $slider = Slider::create([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'link' => $request->link,
            'status' => $request->filled('status')
        ]);

        // upload images
        if ($request->hasFile('slider_image')) {
            $fileName = rand() . time() . '.' . $request->file('slider_image')->extension();
            $slider->addMedia($request->file('slider_image'))
                ->usingFileName($fileName)
                ->toMediaCollection('slider_image');
        }
        notify()->success('Slider created successfully.', 'Added');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        Gate::authorize('app.sliders.edit');
        return view('backend.sliders.form', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        Gate::authorize('app.sliders.edit');
        $slider->update([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'link' => $request->link,
            'status' => $request->filled('status')
        ]);

        // upload images
        if ($request->hasFile('slider_image')) {
            $fileName = rand() . time() . '.' . $request->file('slider_image')->extension();
            $slider->addMedia($request->file('slider_image'))
                ->usingFileName($fileName)
                ->toMediaCollection('slider_image');
        }
        notify()->success('Slider updated successfully.', 'Update');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        Gate::authorize('admin.sliders.destroy');
        $slider->delete();
        notify()->success('Product deleted', 'Success');
        return back();
    }
}
