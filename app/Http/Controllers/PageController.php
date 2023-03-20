<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageStoreRequest;
use App\Http\Requests\PageUpdateRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pages = Page::get()->all();

        return view('pages.index', compact('user', 'pages'));
    }

    public function create()
    {
        $user = Auth::user();

        return view('pages.create', compact('user'));
    }

    public function store(PageStoreRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($request->title);
        if ($request->has('status')) {
            $validated['status'] = ! $validated['status'];
        }

        $page = Page::create($validated);

        return redirect()->route('pages.index')->with('success', 'Page created successfully');
    }

    public function show($id)
    {
        $static_page = Page::findOrFail($id);

        return view('guest.page', compact('static_page'));
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        $page = Page::findOrFail($request->id);

        //dd($page);

        return view('pages.edit', compact('user', 'page'));
    }

    public function update(PageUpdateRequest $request)
    {
        $validated = $request->validated();
        $request->has('status') ? $validated['status'] = true : $validated['status'] = false;
        //$request->has('visibility') ? $validated['visibility'] = true : $validated['visibility'] = false;
        $page = Page::findOrFail($request->id);
        $page->update($validated);

        return redirect()->route('pages.index')->with('success', 'Page update successful');
    }

    public function destroy(Page $page)
    {
        // $page->delete();
    }
}
