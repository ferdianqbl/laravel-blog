<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
// use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/dashboard/posts/index', [
            "title" => "Posts Editor",
            "posts" => Blog::where('user_id', auth()->user()->id)->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/dashboard/posts/create', [
            "title" => "Create Post",
            "categories" => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        // return $req->file('image')->store('post-images');

        // validate the data
        $validatedData = $req->validate([
            'title' => 'required|max:255|unique:blogs',
            'slug' => 'required|max:255|unique:blogs',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'category_id' => 'required',
            'body' => 'required',
        ]);

        // jika ada file yang diupload
        if ($req->file('image'))
            $validatedData['image'] = $req->file('image')->store('post-images');


        $validatedData['user_id'] = auth()->user()->id; // set user_id dari user yang login
        $validatedData['excerpt'] = Str::limit(strip_tags($req->body), 100); // set excerpt dari body yang diupload

        Blog::create($validatedData); // simpan data ke database

        return redirect('dashboard/posts')->with("success", "Post created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $post)
    {
        return view('/dashboard/posts/show', [
            "title" => "Post Editor",
            "post" => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $post)
    {
        return view('/dashboard/posts/edit', [
            "title" => "Edit Post",
            "post" => $post,
            "categories" => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, Blog $post)
    {
        $rules = [
            'category_id' => 'required',
            'body' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ];

        // jika slug lama beda dengan slug baru
        if ($req->slug !== $post->slug) {
            $rules['slug'] = 'required|max:255|unique:blogs';
        }

        //jika title lama beda dengan title baru
        if ($req->title !== $post->title) {
            $rules['title'] = 'required|max:255|unique:blogs';
        }

        // validasi
        $validatedData = $req->validate($rules);

        // jika ada file yang diupload
        if ($req->file('image')) {

            // hapus file lama yang diambil dari database jika ada atau tidak bernilai null
            if ($post->image)
                Storage::delete($post->image);

            // upload file baru ke public
            $validatedData['image'] = $req->file('image')->store('post-images');
        }
        $validatedData['excerpt'] = Str::limit(strip_tags($req->body), 100); // excerpt dari body
        $validatedData['user_id'] = auth()->user()->id; // user_id dari user yang login

        Blog::where('id', $post->id)->update($validatedData); // update data berdasarkan id

        return redirect('dashboard/posts')->with("success", "Post Edited successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $post)
    {
        if ($post->image)
            Storage::delete($post->image); // hapus file yang ada di public/post-images
        Blog::destroy($post->id); // hapus data dari database
        return redirect('dashboard/posts')->with("success", "Post deleted successfully");
    }

    // public function slug(Request $req)
    // {

    //     $slug = SlugService::createSlug(Post::class, 'slug', $req->title);
    //     return response()->json(['slug' => $slug]);
    // }
}
