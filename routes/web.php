<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Models\Category;
use App\Models\Post;
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
      "title" => "Home"
    ]);
});

Route::get('/about', function () {
  return view('about', [
      "title" => "About",
      "name" => "My Blog",
      "email" => "myblog@gmail.com",
      "image" => "man.png"
  ]);
});

Route::get('/posts',[PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
  return view('categories', [
    'title' => 'Categories',
    'categories' => Category::all()
  ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/logout', [LoginController::class, 'logoutNotFound']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot-password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'send_link_forgot_password']);

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'index']);
Route::post('/reset-password', [ResetPasswordController::class, 'update_password']);

Route::get('/dashboard', function() {
  return view('dashboard.index', [
    'title' => 'Dashboard',
    'posts' => Post::where('user_id', auth()->user()->id)->get()
  ]);
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('admin');
Route::resource('/dashboard/categories', AdminCategoryController::class)->middleware('admin');
