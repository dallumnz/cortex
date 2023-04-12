<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;
use Spatie\Sitemap\SitemapGenerator;

class ApplicationController extends Controller
{
    public function select_subcategory(Request $request)
    {
        $id = $request->option;
        $subcategories = Subcategory::where('parent_category_id', '=', $id)
                            ->orderBy('name', 'asc')
                            ->get();

        return response()->json($subcategories);
    }

    public function generateSitemap()
    {
        SitemapGenerator::create(config('app.url'))->getSitemap()->writeToDisk('public', 'sitemap.xml');

        return back()->with('success', 'Sitemap generation successful');
    }
}
