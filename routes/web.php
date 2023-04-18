<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardBlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

// hanya bisa diakses oleh user yang belum terautentikasi
Route::get('/login', [LoginController::class, 'view'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'view'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "active" => "home",
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => "about",
    ]);
});

Route::get('/blog', [BlogController::class, 'showAll']);
Route::get('/blog/{blog:slug}', [BlogController::class, 'find']);

Route::get('/categories', [CategoryController::class, 'show']);

Route::get('/dashboard', function () {
    return view('dashboard.index', [
        "title" => "Dashboard",
    ]);
})->middleware('auth');

Route::resource('/dashboard/posts', DashboardBlogController::class)->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('auth');
