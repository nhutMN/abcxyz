<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\CartController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['prefix'=>''], function(){
    Route::get('/',[ClientController::class, 'index'])->name('layout.index');
    Route::get('/product/{product}',[ClientController::class, 'detail'])->name('layout.detail');
    Route::get('/order',[ClientController::class, 'order'])->name('layout.order');
});

// backned
Route::get('/admin/login',[AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login',[AdminController::class, 'check_login']);

Route::group(['prefix'=>'admin','middleware'=>'auth'], function(){
    Route::get('/',[AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/logout',[AdminController::class, 'logout'])->name('admin.logout');
    // Route::get('/order',[OrderController::class, 'index'])->name('order.index');
    // Route::get('/order/detail/{order}',[OrderController::class, 'show_detail'])->name('order.show_detail');

    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
});

Route::group(['prefix' => 'cart'], function(){
    Route::get('/', [CartController::class, 'view'])->name('cart.view');
    Route::get('/add{product}', [CartController::class, 'addToCart'])->name('add.cart');
});