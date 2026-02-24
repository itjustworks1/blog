<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class FrontController extends Controller
{
    public function home()
    {

        $categories = Category::withCount('posts')->get();
        $posts = Post::all();
        $page_title = "Home";
        return view('front.home', compact('categories', 'posts', 'page_title'));

   }

    public function postsInCategory(int $id)
    {
        $categories = Category::withCount('posts')->get();
        $category = Category::findOrFail($id);
        $posts = $category->posts();
        //dd($posts);
        $page_title = "Posts in Category";
        return view('front.home', compact('categories', 'posts', 'page_title'));

   }
}
