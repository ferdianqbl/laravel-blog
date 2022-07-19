<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function showAll(Request $req)
    {
        // dd($req->search);
        return view('blog', [
            "title" => "Blogs",
            "active" => "blog",
            "blog_posts" => Blog::filter($req)->latest()->get(),
        ]);
    }

    // public function findById($id)
    // {
    //     return view('details', [
    //         "title" => "Details",
    //         "post" => Blog::find($id)
    //     ]);
    // }

    public function find(Blog $blog)
    {
        return view('details', [
            "title" => "Details",
            "active" => "blog",
            "post" => $blog
        ]);
    }
}
