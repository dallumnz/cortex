<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $results = '';
        if ($query = $request->get('query')) {
            $results = Post::search($query)->get();
        }

        return view('search.results')->with('results', $results);
    }
}
