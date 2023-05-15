<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\HomeController;
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

Route::get('/' ,[HomeController::class, 'index']);

Route::resources([
    'content' => 'ContentController',
    'categories' => 'CategoryController'
]);

Route::get('/news', function () {
    return view('pages.newspage.news');
})->name('newspage');


Route::get('/author', function () {
    return view('pages.authorpage.author');
})->name('authorpage');


Route::get('/test', function () {
    return view('pages.selfpage.test');
})->name('test');
