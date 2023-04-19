<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Newsletter;
use App\Models\Page;
use App\Models\Post;
use App\Models\PostArticle;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        //Get posts depending on visibility rules
        $headlines = Post::where('status', 1)->where('headline', 1)->orderBy('created_at', 'desc')->take(4)->get();
        $recommended = Post::where('status', 1)->where('recommended', 1)->orderBy('created_at', 'desc')->take(4)->get();
        $featured = Post::where('status', 1)->where('featured', 1)->latest()->first();
        $categories = Category::all();
        $static_pages = Page::where('status', 1)->where('visibility', 1)->get();

        return view('index', compact('categories', 'featured', 'headlines', 'recommended', 'static_pages'));
    }

    public function staticPage(string $slug)
    {
        $page = Page::where('slug', $slug)->first();

        return view('guest.page', compact('page'));
    }

    public function singlePost(string $slug)
    {
        $article = '';
        $post = Post::where('slug', $slug)->first();
        $categories = Category::get()->all();
        if ($post->post_type == Post::TYPE_ARTICLE) {
            $article = PostArticle::where('post_id', $post->id)->first();
        }

        return view('guest.post', compact('categories', 'post', 'article'));
    }

    public function categories(string $slug)
    {
        $category = Category::where('slug', $slug)->first();
        $categories = Category::get()->all();
        $subcategories = Subcategory::where('parent_category_id', $category->id)->get();
        $posts = Post::where('category_id', $category->id)->get()->all();
        //dd($posts);
        return view('guest.category', compact('category', 'categories', 'subcategories', 'posts'));
    }

    public function subcategories(string $slug)
    {
        $subcategory = Subcategory::where('slug', $slug)->first();
        $subcategories = Subcategory::get()->all();
        $categories = Category::get()->all();
        $posts = Post::where('subcategory_id', $subcategory->id)->get()->all();

        return view('guest.subcategory', compact('subcategory', 'categories', 'subcategories', 'posts'));
    }

    public function subscribeUser(Request $request)
    {
        $validated = $request->validate(
            [
                'email' => 'required|email:filter|email|unique:newsletters,email',
            ],
            [
                'email.unique' => 'This email is already subscribed',
            ]
        );
        $validated['status'] = 1;

        Newsletter::create($request->all());

        return redirect()->route('app.index')->with('success', 'Thank you for subscribing!');
    }

    public function unsubscribeUser(Request $request)
    {
        $newsletter = Newsletter::findOrFail($request->id);
        $newsletter->update('status', 0);

        return redirect()->route('app.index')->with('info', 'You have unsubscribed.');
    }
}
