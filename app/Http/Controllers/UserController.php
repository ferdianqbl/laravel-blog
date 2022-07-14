<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function find(User $author)
    {
        return view('blog', [
            "title" => "$author->name Blogs",
            "blog_posts" => $author->blogs,
        ]);
    }
}
