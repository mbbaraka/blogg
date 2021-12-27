<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Alert;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,gif,jpg,csv,txt,xlx,xls,pdf|max:2048',
            'category' => 'required',
            'featured_text' => 'required|min:50|max:300',
            'description' => 'required|min:200'
        ]);

        $post = new Post();
        $post->author_id = Auth::user()->id;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->category_id = $request->category;
        $post->featured_text = $request->featured_text;
        $post->description = $request->description;

        if ($request->image != "") {
            # code...
            // $name = $request->file('attachments')->getClientOriginalName();

            // $path = $request->file('attachments')->store('public/attachments');


            $file = $request->file('image');

            // Generate a file name with extension
            $fileName = 'image-'.time().'.'.$file->getClientOriginalExtension();

            // Save the file
            $path = $file->storeAs('public/posts', $fileName);

            $post->featured_image = $fileName;

        }else{
            $post->attachments = "";
        }

        $save = $post->save();

        if ($save) {
            toast('Added new post successfully', 'success');
            return redirect()->route('posts');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post_id)
    {
        $post = Post::get();
        $categories = Category::get();
        return view('post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post = Post::find($post);
        $delete = $post->delete();

        if ($delete) {
            toast('Post deleted successfully', 'success');
            return redirect()->back();
        }
    }
}
