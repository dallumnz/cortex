<?php

namespace App\Http\Controllers;

use App\Http\PageStoreRequest;
use App\Http\PageUpdateRequest;

class PageController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function create()
    {
        return view('pages.create');
    }

    public function store(PageStoreRequest $request)
    {
        //
    }

    public function show($id)
    {
        // code...
    }

    public function edit(Page $page)
    {
        // code...
    }

    public function update(PageUpdateRequest $request)
    {
        // code...
    }

    public function destroy(Page $page)
    {
        // $page->delete();
    }
}
