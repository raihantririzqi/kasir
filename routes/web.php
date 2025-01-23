<?php

use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/pelanggan', [PelangganController::class, 'index']);
Route::get('/pelanggan/create', [PelangganController::class, 'create']);
Route::get('/pelanggan/edit/{id}', [PelangganController::class, 'show']);
Route::post('/pelanggan/edit/{id}', [PelangganController::class, 'update']);
Route::post('/pelanggan/create', [PelangganController::class, 'store']);
Route::post('/pelanggan/delete/{id}', [PelangganController::class, 'destroy']);

Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/create', [ProdukController::class, 'create']);
Route::get('/produk/edit/{id}', [ProdukController::class, 'show']);
Route::post('/produk/create', [ProdukController::class, 'store']);
Route::post('/produk/edit/{id}', [ProdukController::class, 'update']);
Route::post('/produk/delete/{id}', [ProdukController::class, 'destroy']);

Route::get('/penjualan', [PenjualanController::class, 'index']);
Route::post('/penjualan/create', [PenjualanController::class, 'store']);

Route::get('/transaksi/{id}', [TransaksiController::class, 'index']);
Route::post('/transaksi/{id}', [TransaksiController::class, 'create_transaksi']);
