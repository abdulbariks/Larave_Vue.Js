<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/{anypath}', [App\Http\Controllers\HomeController::class, 'index'])->where('path', '.*');
// Route::get('/posts', [App\Http\Controllers\Admin\PostController::class, 'index']);
// Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);

Route::post('/addcategory', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('addcategory');
Route::get('/getcategory', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('getcategory');
Route::delete('/removecategory/{id?}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('removecategory');
Route::get('/editcategory/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('removecategory');
Route::post('/updatecategory', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('updatecategory');
