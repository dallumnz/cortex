<?php

namespace App\Http\Controllers;

use App\Models\Analytic;
use App\Models\Category;
use App\Models\Newsletter;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * @return \Illuminate\Http\Response;
     */
    public function index()
    {
        $user = Auth::user();
        $postCount = Post::where('status', '>', 0)->count();
        $categoryCount = Category::get()->count();
        $subscriberCount = Newsletter::get()->count();
        $analytics = Analytic::take(10)->orderBy('created_at', 'desc')->get();

        return view('admin.index', compact('user', 'postCount', 'categoryCount', 'subscriberCount', 'analytics'));
    }

    /**
     * @return \Illuminate\Http\Response;
     */
    public function blank()
    {
        return view('admin.blank');
    }
}
