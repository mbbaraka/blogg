<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'image' => 'file|image|mimes:jpeg,png,gif,jpg,csv,txt,xlx,xls,pdf|max:2048'
        ]);

        $category = new Category();
        $category->title = $request->title;
        $category->slug = Str::slug($request->title);

        if ($request->image != "") {
            # code...
            // $name = $request->file('attachments')->getClientOriginalName();

            // $path = $request->file('attachments')->store('public/attachments');


            $file = $request->file('image');

            // Generate a file name with extension
            $fileName = 'image-'.time().'.'.$file->getClientOriginalExtension();

            // Save the file
            $path = $file->storeAs('public/categories', $fileName);

            $category->image = $fileName;

        }else{
            $category->attachments = "";
        }

        $save = $category->save();

        if ($save) {
            toast('Added new category successfully', 'success');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'file|image|mimes:jpeg,png,gif,jpg,csv,txt,xlx,xls,pdf|max:2048'
        ]);

        $category = Category::find($category);
        $category->title = $request->title;
        $category->slug = Str::slug($request->title);

        if ($request->image != "") {

            $file = $request->file('image');

            // Generate a file name with extension
            $fileName = 'image-'.time().'.'.$file->getClientOriginalExtension();

            // Save the file
            $path = $file->storeAs('public/categories', $fileName);

            $category->image = $fileName;

        }else{
            if ($category->image == "") {
                $category->image = $category->image;
            }
        }

        $save = $category->save();

        if ($save) {
            toast('Updated category successfully', 'success');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
        $category = Category::find($category);
        $delete = $category->delete();

        if ($delete) {
            toast('Deleted category successfully', 'success');
            return redirect()->back();
        }
    }
}
