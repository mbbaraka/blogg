<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::get();
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('front.index', compact('posts', 'categories'));
    }

    public function single ($slug) {
        $post = Post::where('slug', $slug)->first();
        return view('front.single', compact('post'));
    }
}
