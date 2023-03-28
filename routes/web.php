<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentController;
use Symfony\Component\Mime\Encoder\ContentEncoderInterface;

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

Route::get('/' ,[ CategoryController::class, 'index']  , function () {
    return view('pages.homepage.home');
});

Route::get('/news', function () {
    return view('pages.newspage.news');
})->name('newspage');
