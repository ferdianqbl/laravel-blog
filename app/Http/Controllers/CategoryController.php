<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function filteredShow(Category $category)
    {
        return view('filteredCategory', [
            'title' => 'Filtered Category',
            'category' => $category,
        ]);
    }
}
