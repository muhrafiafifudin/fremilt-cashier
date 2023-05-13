<?php

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

require __DIR__ . '/auth.php';

// Route::get('/', function () {
//     return view('pages.auth.login');
// });

Route::get('/', function () {
    if (Auth::user()) {
        return redirect()->route('dashboard');
    }
    return view('pages.auth.login');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    // Dashboard
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    // Employee
    Route::group(['prefix' => 'karyawan', 'as' => 'employee.'], function () {
        Route::get('/', 'App\Http\Controllers\Main\EmployeeController@index')->name('index');
    });
    // Category
    Route::group(['prefix' => 'kategori', 'as' => 'category.'], function () {
        Route::get('/', 'App\Http\Controllers\Main\CategoryController@index')->name('index');
    });
    // Product
    Route::group(['prefix' => 'produk', 'as' => 'product.'], function () {
        Route::get('/', 'App\Http\Controllers\Main\ProductController@index')->name('index');
    });
    // Transaction
    Route::group(['prefix' => 'transaksi', 'as' => 'transaction.'], function () {
        Route::get('/', 'App\Http\Controllers\Transaction\TransactionController@index')->name('index');
        Route::get('/tambah-transaksi', 'App\Http\Controllers\Transaction\TransactionController@create')->name('create');
    });
    // Report
    Route::group(['prefix' => 'laporan', 'as' => 'report.'], function () {
        Route::get('/', 'App\Http\Controllers\Report\ReportController@index')->name('index');
    });
});

// Add aditional route
