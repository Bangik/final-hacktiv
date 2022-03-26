<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TransactionController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// category
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
Route::post('/admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
Route::put('/admin/categories/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
Route::delete('/admin/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

// product
Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products.index');
Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');
Route::get('/admin/products/{id}', [ProductController::class, 'edit'])->name('admin.products.edit');
Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');
Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

// transaction
Route::get('/admin/transactions', [TransactionController::class, 'index'])->name('admin.transactions.index');
Route::post('/admin/transactions/export', [TransactionController::class, 'export'])->name('admin.transactions.export');

