<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function showAll()
    {
        return view('blog', [
            "title" => "Blogs",
            "blog_posts" => Blog::all(),
        ]);
    }

    public function findById($id)
    {
        return view('details', [
            "title" => "Details",
            "post" => Blog::find($id)
        ]);
    }

    public function find(Blog $blog)
    {
        return view('details', [
            "title" => "Details",
            "post" => $blog
        ]);
    }
}
