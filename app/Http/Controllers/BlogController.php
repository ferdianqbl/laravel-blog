<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function showAll(Request $req)
    {
        // dd($req->search);

        $title = "Blogs";

        if ($req->category) {
            $title = "Blogs in " . Category::firstWhere('category_slug', $req->category)->category_name;
        } else if ($req->author) {
            $title = "Blogs by " . User::firstWhere('username', $req->author)->name;
        }

        return view('blog', [
            "title" => $title,
            "active" => "blog",
            "blog_posts" => Blog::filter($req)->latest()->paginate(5)->withQueryString(),
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
