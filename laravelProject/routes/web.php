<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\InterestsController;
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

Route::post('/login', [AccountController::class, 'login']);
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/register', [AccountController::class, 'register']);
Route::get('/register', function () {
    return view('register');
})->name('register');
