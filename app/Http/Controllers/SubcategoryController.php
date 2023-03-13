<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubcategoryStoreRequest;
use App\Http\Requests\SubcategoryUpdateRequest;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $categories = Category::get()->all();
        $category = Category::where('id', $request->id)->first();
        $subcategory = Subcategory::where('parent_category_id', $request->id)->first();

        if ($subcategory === null) {
            $parent_id = $category->id;

            return view('subcategories.index', compact('parent_id', 'categories', 'category', 'user')); //->with('categories', [$categories]);
        }

        $parent_id = $subcategory->parent_category_id;
        $subcategories = Subcategory::where('parent_category_id', $request->id)->get();

        return view('subcategories.index', compact('parent_id', 'category', 'categories', 'subcategories', 'user'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function store(SubcategoryStoreRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($request->name);
        $subcategory = Subcategory::create($validated);

        return redirect()->route('categories.index')->with('success', __('app.common.created'));
    }

    /**
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $subcategory = Subcategory::findOrFail($request->id);
        $subcategories = Subcategory::where('parent_category_id', $request->id)->get();
        $parent_id = $subcategory->parent_category_id;
        $category = Category::find($parent_id, 'id')->first();

        return view('subcategories.index', compact('parent_id', 'category', 'subcategory', 'subcategories'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function update(SubcategoryUpdateRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($request->name);

        $subcategory = Subcategory::findOrFail($request->id);
        $subcategory->update($validated);

        return redirect()->route('categories.index')->with('success', __('app.common.saved'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();

        return redirect()->route('categories.index')->with('success', __('app.common.removed'));
    }
}
