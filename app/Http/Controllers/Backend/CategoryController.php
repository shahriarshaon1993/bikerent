<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
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
        $parentCategories = Category::select('id', 'name', 'parent_id', 'updated_at')->orderBy('id', 'DESC')->get();
        return view('backend.category.index', compact('parentCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.bikes.create');
        $parentCategories = Category::with('subcategory')->whereNull('parent_id')->get();
        return view('backend.category.form', compact('parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        Gate::authorize('app.bikes.create');
        Category::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);
        notify()->success('Category created successfully.', 'Added');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        Gate::authorize('app.bikes.edit');
        $parentCategories = Category::with('subcategory')->whereNull('parent_id')->get();
        return view('backend.category.form', compact('category', 'parentCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        Gate::authorize('app.bikes.edit');
        $category->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id
        ]);
        notify()->success('Category update successfully.', 'Updated');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Gate::authorize('app.bikes.destroy');
        $category->delete();
        notify()->success('Category deleted', 'Success');
        return back();
    }
}
