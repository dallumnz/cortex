<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;

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
}
