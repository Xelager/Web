<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\InterestsController;
use App\Models\Blog;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
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
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

Route::get('/contacts', function () {
    return view('test');
})->name('contacts');

Route::get('/aboutMe', function () {
    return view('aboutMe');
})->name('aboutMe');

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/interests', [InterestsController::class, 'show'])->name('interests');
Route::get('/gallery', [GalleryController::class, 'show'])->name('gallery');
Route::get('/blog', [BlogController::class, 'show'])->name('blog');
Route::get('/logout', [AccountController::class, 'logout']);

if (!isset($_SESSION['user']))
{
    Route::post('/login', [AccountController::class, 'login']);
    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::post('/register', [AccountController::class, 'register']);
    Route::get('/register', function () {
        return view('register');
    })->name('register');
}

// ================ User ================
if (isset($_SESSION['user']) && (!isset($_SESSION['user']['isAdmin']) || $_SESSION['user']['isAdmin'] == 0)) {
    Route::get('/user/blog', function () {
        $publications = DB::table('blogs')->orderBy('createdAt', 'desc')->paginate(env("MAX_PAGINATE"));
        Paginator::useBootstrap();
        return view("/user/userBlog", compact('publications'));
    })->name('userBlog');

    Route::get('/user/comments', function () {
        $publications = DB::table('blogs')->orderBy('createdAt', 'desc')->paginate(env("MAX_PAGINATE"));
        Paginator::useBootstrap();
        return view("/user/comments", compact('publications'));
    })->name('commentsBlog');

    Route::get('/user/testBlog', function () {
        $publications = DB::table('blogs')->orderBy('createdAt', 'desc')->paginate(env("MAX_PAGINATE"));
        Paginator::useBootstrap();
        return view("/user/testBlog", compact('publications'));
    })->name('testBlog');

    Route::post('/user/blog/addComment', [BlogController::class, 'addComment']);
}

    // ================ Admin ================
if (isset($_SESSION['user']['isAdmin']) && $_SESSION['user']['isAdmin']) {
    Route::get('/admin/blog', function () {
        $publications = DB::table('blogs')->orderBy('createdAt', 'desc')->paginate(env("MAX_PAGINATE"));
        Paginator::useBootstrap();
        return view("/admin/adminBlog", compact('publications'));
    })->name('adminBlog');
        Route::post('/admin/blog', [BlogController::class, 'addPublication']);
    Route::post('/admin/blog/loadBlogCSV', [BlogController::class, 'loadBlogCSV']);
    Route::post('/admin/blog/update', [BlogController::class, 'update']);
    Route::get('/admin/blog/delete/{id}', function ($id) {
        $deleteElement = Blog::all()->find($id);
        if ($deleteElement)
        {
            $deleteElement->delete();
        }
        $publications = DB::table('blogs')->orderBy('createdAt', 'desc')->paginate(5);
        Paginator::useBootstrap();
        return redirect("../admin/blog")->with(compact('publications'));
    });
}


