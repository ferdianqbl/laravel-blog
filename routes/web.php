<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
// use App\Http\Controllers\UserController;
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

Route::get('/login', [LoginController::class, 'view']);
Route::get('/register', [RegisterController::class, 'view']);
