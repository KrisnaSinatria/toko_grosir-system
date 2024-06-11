<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionHistoryController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductCategoryController;

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

// Route::get('/', function () {
//     return view('login');
// });

Route::get('/',  [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/',  [LoginController::class, 'authenticate']);

Route::get('/logout',  [LoginController::class, 'logout']);
Route::post('/logout',  [LoginController::class, 'logout']);

// Route::get('/dashboard/transaction/create', [SearchController::class, 'search']);

Route::group(['middleware' => ['admin:admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/dashboard/product/checkSlug', [ProductController::class, 'checkSlug']);
    Route::get('/dashboard/product/category/checkSlug', [ProductCategoryController::class, 'checkSlug']);
    Route::resource('/dashboard/product/category', ProductCategoryController::class);
    Route::resource('/dashboard/product', ProductController::class);
    Route::resource('/dashboard/supplier', SupplierController::class);
    Route::resource('/dashboard/inventory', InventoryController::class);
    Route::resource('/dashboard/staff', StaffController::class);
   

});

Route::group(['middleware' => ['admin:admin,staff']], function () {
    Route::resource('/dashboard/transaction/history', TransactionHistoryController::class);
    Route::resource('/dashboard/transaction', TransactionController::class);

});
