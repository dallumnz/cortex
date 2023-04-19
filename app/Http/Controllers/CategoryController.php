<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $categories = Category::get()->all();

        return view('categories.index', compact('categories', 'user'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($request->name);
        $category = Category::create($validated);

        return redirect()->route('categories.index')->with('success', __('app.common.created'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user = Auth::user();
        $category = Category::findOrFail($request->id);
        $categories = Category::get()->all();
        $subcategory = Subcategory::where('parent_category_id', $category->id);

        return view('categories.index', compact('categories', 'category', 'subcategory', 'user'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($request->name);

        $category = Category::findOrFail($request->id);
        $category->update($validated);

        return redirect()->route('categories.index')->with('success', __('app.common.saved'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if ($category->subcategories()->count() > 0) {
            //dd($category);
            //exit();
            return redirect()->route('categories.index')->with('error', __('app.categories.in_use'));
        }

        $category->delete();

        return redirect()->route('categories.index')->with('success', __('app.common.removed'));
    }
}
