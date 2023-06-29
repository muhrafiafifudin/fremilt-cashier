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
    Route::group(['prefix' => 'karyawan', 'as' => 'user.'], function () {
        Route::get('/', 'App\Http\Controllers\Main\UserController@index')->name('index');
        Route::post('/', 'App\Http\Controllers\Main\UserController@store')->name('store');
        Route::match(['put', 'patch'], '/{user}', 'App\Http\Controllers\Main\UserController@update')->name('update');
        Route::delete('/{user}', 'App\Http\Controllers\Main\UserController@destroy')->name('destroy');
    });
    // Category
    Route::group(['prefix' => 'kategori', 'as' => 'category.'], function () {
        Route::get('/', 'App\Http\Controllers\Main\CategoryController@index')->name('index');
        Route::post('/', 'App\Http\Controllers\Main\CategoryController@store')->name('store');
        Route::match(['put', 'patch'], '/{category}', 'App\Http\Controllers\Main\CategoryController@update')->name('update');
        Route::delete('/{category}', 'App\Http\Controllers\Main\CategoryController@destroy')->name('destroy');
    });
    // Ingredient
    Route::group(['prefix' => 'bahan', 'as' => 'ingredient.'], function () {
        Route::get('/', 'App\Http\Controllers\Main\IngredientController@index')->name('index');
        Route::post('/', 'App\Http\Controllers\Main\IngredientController@store')->name('store');
        Route::match(['put', 'patch'], '/{ingredient}', 'App\Http\Controllers\Main\IngredientController@update')->name('update');
        Route::delete('/{ingredient}', 'App\Http\Controllers\Main\IngredientController@destroy')->name('destroy');
    });
    // Topping
    Route::group(['prefix' => 'toping', 'as' => 'topping.'], function () {
        Route::get('/', 'App\Http\Controllers\Main\ToppingController@index')->name('index');
        Route::post('/', 'App\Http\Controllers\Main\ToppingController@store')->name('store');
        Route::match(['put', 'patch'], '/{topping}', 'App\Http\Controllers\Main\ToppingController@update')->name('update');
        Route::delete('/{topping}', 'App\Http\Controllers\Main\ToppingController@destroy')->name('destroy');
    });
    // Product
    Route::group(['prefix' => 'produk', 'as' => 'product.'], function () {
        Route::get('/', 'App\Http\Controllers\Main\ProductController@index')->name('index');
        Route::post('/', 'App\Http\Controllers\Main\ProductController@store')->name('store');
        Route::match(['put', 'patch'], '/{product}', 'App\Http\Controllers\Main\ProductController@update')->name('update');
        Route::delete('/{product}', 'App\Http\Controllers\Main\ProductController@destroy')->name('destroy');
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
