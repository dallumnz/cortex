<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostArticle;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

//use Spatie\MediaLibrary\Models\Media;

class PostController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        $user = Auth::user();

        return view('posts.index', compact('posts', 'user'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($request->title);
        $validated['created_by'] = Auth::user()->id;
        $request->has('status') ? $validated['status'] = true : $validated['status'] = false;
        $request->has('featured') ? $validated['featured'] = true : $validated['featured'] = false;
        $request->has('breaking') ? $validated['breaking'] = true : $validated['breaking'] = false;
        $request->has('recommended') ? $validated['recommended'] = true : $validated['recommended'] = false;
        $request->has('headline') ? $validated['headline'] = true : $validated['headline'] = false;
        // Add post
        $post = Post::create($validated);

        // Add post type
        $data = $request->all();
        if ($data['post_type'] == Post::TYPE_ARTICLE) {
            $article_data = [
                'post_id' => $post->id,
                'content' => $data['content'],
            ];
            $article = new PostArticle($article_data);
            $post->postArticle()->save($article);
        }
        // Add post image
        if ($request->hasFile('post_image') && $request->file('post_image')->isValid()) {
            $post->addMediaFromRequest('post_image')->toMediaCollection('post_images');
        }
        // Update SEO
        $this->updateSEO($post);

        return redirect()->route('posts.index')->with('success', __('app.common.created'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = '';
        $post = Post::findOrFail($id);
        $user = User::find($post->created_by, 'id')->first();
        $subcategory = Subcategory::find($post->subcategory_id, 'id')->first();
        $category = Category::find($subcategory->parent_category_id, 'id')->first();

        if ($post->post_type == Post::TYPE_ARTICLE) {
            $article = PostArticle::where('post_id', $post->id)->first();
        }

        return view('posts.show', compact('user', 'subcategory', 'category', 'post', 'article'));
    }

    /**
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = $request->all();
        $user = Auth::user();
        $article = '';
        $post = Post::findOrFail($request->id);
        $categories = Category::get()->all();
        $subcategory = $post->subcategory_id;
        $subcategories = Subcategory::where('parent_category_id', $post->subcategory_id)->get();

        if ($post->post_type == Post::TYPE_ARTICLE) {
            $article = PostArticle::where('post_id', $post->id)->first();
        }

        return view('posts.edit', compact('subcategory', 'subcategories', 'categories', 'post', 'article', 'user'));
    }

    /**
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request)
    {
        $validated = $request->validated();
        $validated['slug'] = Str::slug($request->title);
        $validated['created_by'] = Auth::user()->id;
        $request->has('status') ? $validated['status'] = true : $validated['status'] = false;
        $request->has('featured') ? $validated['featured'] = true : $validated['featured'] = false;
        $request->has('breaking') ? $validated['breaking'] = true : $validated['breaking'] = false;
        $request->has('recommended') ? $validated['recommended'] = true : $validated['recommended'] = false;
        $request->has('headline') ? $validated['headline'] = true : $validated['headline'] = false;

        $post = Post::findOrFail($request->id);
        $post->update($validated);
        $this->updateSEO($post);

        if ($post->post_type == Post::TYPE_ARTICLE) {
            PostArticle::where('post_id', $post->id)->update(['content' => $request->content]);
            $imageCheck = $request->has('post_image'); // && $request('post_image')->isValid();

            if ($imageCheck) {
                $alreadyExists = Media::where('model_id', $post->id)->first();
                if ($alreadyExists) {
                    $alreadyExists->delete();
                }
                $image = $request->file('post_image');
                $this->uploadImage($image, $post->id);
            }
        }

        return redirect()->route('posts.index')->with('success', __('app.common.saved'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ($post->post_type == Post::TYPE_ARTICLE) {
            PostArticle::where('post_id', $post->id)->delete();
        }
        // Delete post dependencies
        $seo = $post->seo();
        $seo->delete();
        // TODO: Probably should delete any images too
        $post->delete();

        return redirect()->route('posts.index')->with('success', __('app.common.removed'));
    }

    public function postType(Request $request)
    {
        $user = Auth::user();

        if ($request->get('section') === null) {
            return redirect()->route('posts.index')->with('error', 'Post type not specified.');
        }

        $sectionName = $request->get('section') === null ? 'article-create' : $request->get('section');

        if ($sectionName == Post::POST_FORMAT) {
            return redirect()->route(Post::POST_FORMAT);
        } else {
            $sectionType = Post::TYPE_ARTICLE;
        }

        $categories = Category::get()->all();
        $subcategories = Subcategory::get()->all();

        return view('posts.create', compact('sectionName', 'sectionType', 'categories', 'subcategories', 'user'));
    }

    public function postFormat(Request $request)
    {
        $user = Auth::user();
        $sectionName = $request->get('section') === null ? 'post_format' : $request->get('section');

        if ($request->get('section') != null) {
            $sectionType = match ($sectionName) {
                Post::ARTICLE => Post::TYPE_ARTICLE,
                default => Post::POST_NONE,
            };

            return view('posts.index', compact('sectionName', 'sectionType', 'user'));
        }

        return view("posts.$sectionName", compact('sectionName', 'user'));
    }

    public function uploadImage($image, $post_id)
    {
        $user = Auth::user();
        $post = Post::findOrFail($post_id);

        $checkImage = Media::where('collection_name', 'post_images')
            ->where('file_name', $image->getClientOriginalName())
            ->exists();
        if (! $checkImage) {
            if (! empty($image)) {
                $media = $post->addMedia($image->path())
                        ->usingFileName($post->slug.'.'.$image->extension())
                        ->toMediaCollection('post_images');
            }
            $upload['id'] = $media->id;
            $upload['url'] = $media->getFullUrl();

            return back()->with(true);
        } else {
            return back()->with(false);
        }
    }

    public function updateSEO(Post $post)
    {
        return $post->seo->update([
            'title' => $post->title,
            'description' => $post->description,
            'author' => $post->user->name,
            'image' => $post->post_image,
        ]);
    }
}
