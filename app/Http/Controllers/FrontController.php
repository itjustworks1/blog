<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class FrontController extends Controller
{
    public function home()
    {
        $categories = Category::with('posts')->get();
//        dd($categories[0]->title);
        $posts = Post::orderBy('created_at', 'desc')->paginate(6);
        $page_title = "Home";
        return view('front.home', compact('categories', 'posts', 'page_title'));

   }

    public function postsInCategory(Category $category)
    {
        $categories = Category::with('posts')->get();
//        $category = $categories->findOrFail($id);
//        dd($category->posts());
        $posts = $category->posts()->get();
       // dd($posts);
        $page_title = "Posts in Category";
        return view('front.home', compact('categories', 'posts', 'page_title'));

   }
    public function post(int $id)
    {
        $categories = Category::with('posts')->get();
        $posts = Post::all();
        $post = $posts->find($id);
        $page_title = "Posts in Posts";
        return view('front.post', compact('categories', 'post', 'page_title'));
   }
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    Post::create([
        'title' => $validated['title'],
        'description' => $validated['description'],
        'content' => $validated['content'],
        "slug" => Str::slug($validated['title'], '-'),
        'category_id' => 0, //1234567890
        'user_id' => auth()->id(),
    ]);

    return redirect()->route('home')->with('success', 'Post created successfully');
}

    public function show(Post $post)
    {
        Gate::authorize('view-post', $post);
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        Gate::authorize('update-post', $post);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        Gate::authorize('update-post', $post);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update($validated);

        return redirect()->route('home')->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        Gate::authorize('delete-post', $post);

        $post->delete();
        return redirect()->route('home')->with('success', 'Post deleted successfully');
    }
}
