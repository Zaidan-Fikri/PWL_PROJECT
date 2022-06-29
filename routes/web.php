<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\DataKarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangMasukController;
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

Route::resource('karyawan', DataKarController::class);

Route::resource('dashboard', DashboardController::class);

Route::resource('barang', BarangController::class);

Route::resource('customer', CustomerController::class);

Route::resource('supplier', SupplierController::class);

Route::resource('barang_masuk', BarangMasukController::class);

Route::get('/barang_masuk/cetak_pdf', [BarangMasukController::class, 'cetak_pdf'])->name('barang_masuk.cetak_pdf');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
