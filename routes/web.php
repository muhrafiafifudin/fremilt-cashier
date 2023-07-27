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
        Route::get('/', 'App\Http\Controllers\System\UserController@index')->name('index');
        Route::post('/', 'App\Http\Controllers\System\UserController@store')->name('store');
        Route::match(['put', 'patch'], '/{user}', 'App\Http\Controllers\System\UserController@update')->name('update');
        Route::delete('/{user}', 'App\Http\Controllers\System\UserController@destroy')->name('destroy');
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
    // Incoming Transaction
    Route::group(['prefix' => 'transaksi-masuk', 'as' => 'incoming-transaction.'], function () {
        // All Transaction Page
        Route::get('/', 'App\Http\Controllers\Transaction\IncomingTransactionController@index')->name('index');
        // New Transaction Page
        Route::get('/transaksi-baru', 'App\Http\Controllers\Transaction\IncomingTransactionController@create')->name('create');
        Route::get('/transaksi-baru/{incomingTransaction}', 'App\Http\Controllers\Transaction\IncomingTransactionController@confirmTransaction')->name('confirm');
        Route::get('/pembayaran/{incomingTransaction}/{paymentType}', 'App\Http\Controllers\Transaction\IncomingTransactionController@payment')->name('payment');
        Route::post('/pembayaran', 'App\Http\Controllers\Transaction\IncomingTransactionController@paymentPost')->name('add-payment');
        // Detail Transaction
        Route::get('/{incomingTransaction}', 'App\Http\Controllers\Transaction\IncomingTransactionController@show')->name('show');
        // Add & Update Transaction Data
        Route::post('/', 'App\Http\Controllers\Transaction\IncomingTransactionController@store')->name('store');
        Route::match(['put', 'patch'], '/{incomingTransaction}', 'App\Http\Controllers\Transaction\IncomingTransactionController@update')->name('update');
        // Delete Transaction
        Route::delete('/{incomingTransaction}', 'App\Http\Controllers\Transaction\IncomingTransactionController@destroy')->name('destroy');
        // Cart
        Route::post('/add-product', 'App\Http\Controllers\Transaction\IncomingTransactionController@addProduct')->name('add-product');
        Route::post('/update-product', 'App\Http\Controllers\Transaction\IncomingTransactionController@updateProduct')->name('update-product');
        Route::post('/delete-product', 'App\Http\Controllers\Transaction\IncomingTransactionController@deleteProduct')->name('delete-product');
    });
    // Outgoing Transaction
    Route::group(['prefix' => 'transaksi-keluar', 'as' => 'outgoing-transaction.'], function () {
        // All Transaction Page
        Route::get('/', 'App\Http\Controllers\Transaction\OutgoingTransactionController@index')->name('index');
        // New Transaction Page
        Route::get('/transaksi-baru', 'App\Http\Controllers\Transaction\OutgoingTransactionController@create')->name('create');
        Route::get('/transaksi-baru/{outgoingTransaction}', 'App\Http\Controllers\Transaction\OutgoingTransactionController@confirmTransaction')->name('confirm');
        Route::get('/pembayaran/{outgoingTransaction}/{paymentType}', 'App\Http\Controllers\Transaction\OutgoingTransactionController@payment')->name('payment');
        Route::post('/pembayaran', 'App\Http\Controllers\Transaction\OutgoingTransactionController@paymentPost')->name('add-payment');
        // Detail Transaction
        Route::get('/{outgoingTransaction}', 'App\Http\Controllers\Transaction\OutgoingTransactionController@show')->name('show');
        // Add & Update Transaction Data
        Route::post('/', 'App\Http\Controllers\Transaction\OutgoingTransactionController@store')->name('store');
        Route::match(['put', 'patch'], '/{outgoingTransaction}', 'App\Http\Controllers\Transaction\OutgoingTransactionController@update')->name('update');
        // Delete Transaction
        Route::delete('/{incomingTransaction}', 'App\Http\Controllers\Transaction\IncomingTransactionController@destroy')->name('destroy');
        // Cart
        Route::post('/add-product', 'App\Http\Controllers\Transaction\OutgoingTransactionController@addProduct')->name('add-product');
        Route::post('/update-product', 'App\Http\Controllers\Transaction\OutgoingTransactionController@updateProduct')->name('update-product');
        Route::post('/delete-product', 'App\Http\Controllers\Transaction\OutgoingTransactionController@deleteProduct')->name('delete-product');
        // Print Ourgoing Transaction
        Route::get('/print-outgoing-transaction/{outgoingTransaction}', 'App\Http\Controllers\Transaction\OutgoingTransactionController@pdf_print')->name('pdf-print');
    });
    // Report
    Route::group(['prefix' => 'laporan', 'as' => 'report.'], function () {
        // User
        Route::get('/user', 'App\Http\Controllers\Report\ReportController@user_report')->name('user');
        Route::get('/print-user', 'App\Http\Controllers\Report\ReportController@pdf_user_report')->name('user-pdf');
        // Ingredient
        Route::get('/bahan', 'App\Http\Controllers\Report\ReportController@ingredient_report')->name('ingredient');
        Route::get('/print-bahan', 'App\Http\Controllers\Report\ReportController@pdf_ingredient_report')->name('ingredient-pdf');
        // Topping
        Route::get('/toping', 'App\Http\Controllers\Report\ReportController@topping_report')->name('topping');
        Route::get('/print-toping', 'App\Http\Controllers\Report\ReportController@pdf_topping_report')->name('topping-pdf');
        // Product
        Route::get('/produk', 'App\Http\Controllers\Report\ReportController@product_report')->name('product');
        Route::get('/print-produk', 'App\Http\Controllers\Report\ReportController@pdf_product_report')->name('product-pdf');
        // Incoming Transaction
        Route::get('/transaksi-masuk', 'App\Http\Controllers\Report\ReportController@incoming_transaction_report')->name('incoming-transaction');
        Route::get('/print-transaksi-masuk/{fromDate}/{toDate}', 'App\Http\Controllers\Report\ReportController@pdf_incoming_transaction_report')->name('incoming-transaction-pdf');
        // Outgoing Transaction
        Route::get('/transaksi-keluar', 'App\Http\Controllers\Report\ReportController@outgoing_transaction_report')->name('outgoing-transaction');
        Route::get('/print-transaksi-keluar/{fromDate}/{toDate}', 'App\Http\Controllers\Report\ReportController@pdf_outgoing_transaction_report')->name('outgoing-transaction-pdf');
    });
});
