<?php

use App\Http\Controllers\barangController;
use App\Http\Controllers\bukuBarangController;
use App\Http\Controllers\kartuBarangController;
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
})->name('Dashboard');
// Barang
Route::get('/barang', [barangController::class, 'index'])->name('barang.index');
Route::get('/barang/create', [barangController::class, 'create'])->name('barang.create');
Route::post('/barang/store', [barangController::class, 'store'])->name('barang.store');
Route::get('/barang/{barang}/edit', [barangController::class, 'show'])->name('barang.show');
Route::post('/barang/edit', [barangController::class, 'edit'])->name('barang.edit');
Route::get('/barang/{id}/destroy', [barangController::class, 'destroy'])->name('barang.destroy');
// BukuBarang
Route::get('/bukubarang', [bukuBarangController::class, 'index'])->name('bukubarang.index');
Route::get('/export', [bukuBarangController::class, 'export'])->name('bukubarang.export');
Route::get('/bukubarang/create', [bukuBarangController::class, 'create'])->name('bukubarang.create');
Route::post('/bukubarang/store', [bukuBarangController::class, 'store'])->name('bukubarang.store');
Route::get('/bukubarang/{barang}/edit', [bukuBarangController::class, 'show'])->name('bukubarang.show');
Route::post('/bukubarang/edit', [bukuBarangController::class, 'edit'])->name('bukubarang.edit');
Route::get('/bukubarang/{id}/destroy', [bukuBarangController::class, 'destroy'])->name('bukubarang.destroy');
// KartuBarang
Route::get('/kartubarang', [kartuBarangController::class, 'index'])->name('kartubarang.index');
Route::get('/exportkartubarang', [kartuBarangController::class, 'export'])->name('kartubarang.export');


