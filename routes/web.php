<?php

use App\Http\Livewire\Clients\Home;
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
});

