<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostTagController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\Sort;
use App\Http\Controllers\UserController;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
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


// Home 
Route::get('/', [HomeController::class, 'index'])
    ->name('home.index');
Route::get('/home', [HomeController::class, 'index']);
// Contact
Route::get('/contact', [AboutController::class, 'contact'])
    ->name('home.contact');

Route::get('/secret', [HomeController::class, 'secret'])
    ->name('secret')
    ->middleware('can:home.secret');

Route::resource('posts', PostController::class);
Route::resource('product', ProductsController::class);
Route::resource('cart', CartController::class);
Route::resource('users', UserController::class);

Route::post('/buy', [BuyController::class, 'purchase'])
    ->name('buy');
Route::get('/sale', [BuyController::class, 'saleRecord'])
    ->name('saleRecord');

Route::get('/sortbyName', [Sort::class, 'sortbyName'])->name('sortbyName');
Route::get('/sortbyType', [Sort::class, 'sortbyType'])->name('sortbyType');
Route::get('/sortbyManufacturer', [Sort::class, 'sortbyManufacturer'])->name('sortbyManufacturer');
Route::get('/sortbySales', [Sort::class, 'sortbySales'])->name('sortbySales');
Route::get('/sortbyPrice_range', [Sort::class, 'sortbyPrice_range'])->name('sortbyPrice_range');

Route::post('/comment/store', [CommentsController::class, 'store'])
    ->name('comments.store');
Route::delete('/comment/destroy', [CommentsController::class, 'destroy'])
    ->name('comments.destroy');

Route::get('/posts/tag/{tag}', [PostTagController::class, 'index'])
    ->name('posts.tags.index');

// Route::get('/single', AboutController::class)
//     ->name('single');




// Route::resource('comment', CommentsController::class)
Auth::routes();

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
