<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CartController;
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

Route::get('/articles',  [ArticleController::class, 'index']);

Route::get('/articles/page/',  [ArticleController::class, 'indexPage']);

Route::get('/cart',  [CartController::class, 'index']);

Route::post('/cart/addToCart',  [CartController::class, 'addToCart']);

Route::post('/cart/deleteFromCart/',  [CartController::class, 'deleteFromCart']);
