<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show()
    {
        return view('categories', [
            'title' => 'Categories',
            'active' => 'categories',
            'categories' => Category::all(),
        ]);
    }

    public function filteredShow(Category $category)
    {
        return view('blog', [
            'title' => "$category->category_name Category",
            'active' => 'categories',
            'category' => $category,
            'blog_posts' => $category->blogs->load('author', 'category'),
        ]);
    }
}
