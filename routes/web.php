<?php

use App\Http\Controllers\pdfController;
use App\Http\Livewire\ProductsShow;
use App\Http\Livewire\SalesCreate;
use App\Http\Livewire\ShoppingCreate;
use App\Http\Livewire\ShoppingShow;
use App\Http\Livewire\ShowSales;
use App\Http\Livewire\StoreShow;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([  'auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
   
    Route::get('products', ProductsShow::class )->name('show.products');
    Route::get('store', StoreShow::class )->name('show.store');
    Route::get('sales', ShowSales::class )->name('show.sales');
    Route::get('shoppings', ShoppingShow::class )->name('show.shoppings');
    Route::get('create-sales', SalesCreate::class )->name('sales.create');
    Route::get('factura/{item}', [pdfController::class, 'index'] )->name('sales.factura');
    Route::get('create-shopping', ShoppingCreate::class )->name('shopping.create');

});
