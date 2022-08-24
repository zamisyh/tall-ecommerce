<?php

use App\Http\Livewire\Admin\Category;
use App\Http\Livewire\Admin\Home as AdminHome;
use App\Http\Livewire\Clients\Home;
use App\Http\Livewire\Clients\Pages\Auth\Signin;
use App\Http\Livewire\Clients\Pages\Products\Checkout;
use App\Http\Livewire\Clients\Pages\Products\Detail;
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

Route::name('client.')->group(function() {
    Route::get('/', Home::class)->name('home');
    Route::get('/category/product', Detail::class)->name('product.detail');
    Route::get('/checkout', Checkout::class)->name('product.checkout');

    Route::prefix('auth')->group(function () {
        Route::name('auth.')->group(function() {
            Route::get('/signin', Signin::class)->name('signin');
        });
    });

});

Route::name('admin.')->group(function() {
    Route::prefix('dashboard')->group(function() {
        Route::middleware(['auth'])->group(function () {
            Route::get('/', AdminHome::class)->name('home');

            //Admin role
            Route::middleware(['role:admin'])->group(function() {
                Route::get('/category', Category::class)->name('category');
            });

        });
    });
});

