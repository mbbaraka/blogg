<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Alert;
use App\Models\Reply;
use App\Models\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
    public function admin()
    {
        return view('home');
    }

    public function index()
    {
        $title = 'Home';
        $categories = Category::get();
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('front.index', compact('posts', 'categories', 'title'));
    }

    public function single ($slug) {
        $view = new View();
        $post = Post::where('slug', $slug)->first();
        $comments = Comment::where('post_id', $post->id)->get();

        $view->post_id = $post->id;
        $view->visitor_id = Str::random(40);
        $view->save();
        return view('front.single', compact('post', 'comments'));
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

    /**
     * Store reply from the viewer
     *
     */
    public function reply (Request $request, $comment) {
        $comment = Comment::where('id', $comment)->first();

        $reply = new Reply();
        $reply->author_id = Auth::user()->id;
        $reply->comment_id = $comment->id;
        $reply->reply = $request->reply;

        $save = $reply->save();

        if ($save) {
            toast('Reply submitted successfully', 'success');
            return redirect()->back();
        }
    }

    public function category ($slug) {
        $category = Category::where('slug', $slug)->first();
        $posts = Post::where('category_id', $category->id)->paginate(5);
        $categories = Category::get();
        $title = $category->title;
        return view('front.categories', compact('posts', 'categories', 'title', 'category'));
    }

    public function profile () {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    /** Change Password */

    public function changePassword (Request $request) {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            // Current password and new password same
            return redirect()->back()->with("error","New Password cannot be same as your current password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password successfully changed!");
    }

    public function about () {
        return view('front.about');
    }

    public function contact () {
        return view('front.contact');
    }
}
