<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Store comment from the viewer
     *
     */
    public function comment (Request $request, $post) {
        $post = Post::where('slug', $post)->first();

        $comment = new Comment();
        $comment->author_id = Auth::user()->id;
        $comment->post_id = $post->id;
        $comment->comment = $request->comment;

        $save = $comment->save();

        if ($save) {
            toast('Comment submitted successfully', 'success');
            return redirect()->back();
        }
    }
}
