<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AnalyticController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('analytics.index', compact('user'));
    }
}
