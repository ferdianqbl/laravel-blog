<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('home', [
        "title" => "Home",
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
    ]);
});

Route::get('/blog', [BlogController::class, 'showAll']);

// single post
Route::get('/blog/{blog:slug}', [BlogController::class, 'find']);

Route::get('/categories', [CategoryController::class, 'show']);
Route::get('/categories/{category:category_slug}', [CategoryController::class, 'filteredShow']);
