<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home()
    {
        $categories = Category::all();
        $posts = Post::all();
        $page_title = "Home";
        return view('front.home', compact('categories', 'posts', 'page_title'));

   }

    public function postsInCategory(\http\Env\Request $request)
    {
        $categories = Category::all();
        $posts = Post::all();

   }
}
