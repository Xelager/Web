<?php

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
