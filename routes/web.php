<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\artikelController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ReservasiController;


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

Route::get('/', function () {
    return view('loginPage');
});

Route::get('/', [LoginController::class, 'login'])->middleware('guest')->name('login');
Route::post('/', [LoginController::class, 'getLogin']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/dashboard', [dashboardController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::get('/reservasi', [ReservasiController::class,'reservasi'])->middleware('auth');
Route::get('/reservasi/{id}/{status}', [ReservasiController::class,'updateReservasi'])->middleware('auth');


Route::get('/lowongan', [LowonganController::class, 'lowongan'])->middleware('auth')->name('lowongan');
Route::get('/lowongan/add', [LowonganController::class, 'editlowongan'])->middleware('auth');
Route::get('/lowongan/{id}', [LowonganController::class, 'lowongandetail'])->middleware('auth');
Route::post('/lowongan/addLowongan', [LowonganController::class, 'addLowongan'])->middleware('auth')->name('addLowongan');
Route::post('/lowongan/editLowongan/{id}', [LowonganController::class, 'edit'])->middleware('auth');
Route::get('/lowongan/delete/{id}', [LowonganController::class, 'deletelowongan'])->middleware('auth')->name('deletelowongan');

Route::get('/layanan', [LayananController::class,'layanan']);
Route::get('/layanan/info', [LayananController::class, 'infoLayanan']);
Route::get('/layanan/deskripsi', [LayananController::class, 'descLayanan']);
Route::get('/layanan/additional', [LayananController::class, 'additional']);
Route::get('/layanan/review', [LayananController::class, 'review']);
Route::get('/layanan/qna', [LayananController::class, 'qna']);
Route::post('/layanan/add', [LayananController::class, 'addLayanan']);
Route::get('/layanan/delete/{id}', [LayananController::class, 'deleteLayanan']);
Route::get('/layanan/{id}', [LayananController::class, 'layanandetail']);
Route::post('/layanan/editLayanan/{id}', [LayananController::class, 'edit']);

Route::get('/artikel', [artikelController::class, 'artikel'])->middleware('auth')->name('artikel');
Route::get('/artikel/add', [artikelController::class, 'editArtikel'])->middleware('auth');
Route::get('/artikel/{id}', [artikelController::class, 'articledetail'])->middleware('auth');
Route::post('/artikel/addArtikel', [artikelController::class, 'addArtikel'])->middleware('auth')->name('addArtikel');
Route::post('/artikel/editArtikel/{id}', [artikelController::class, 'edit'])->middleware('auth');
Route::get('/artikel/delete/{id}', [artikelController::class, 'deleteArtikel'])->middleware('auth')->name('deleteArtikel');

Route::get('/ulasan', [UlasanController::class, 'ulasan'])->middleware('auth');

Route::get('/penjualan', [PenjualanController::class, 'penjualan'])->middleware('auth')->name('penjualan');
Route::get('/penjualan/add', [PenjualanController::class, 'editPenjualan'])->middleware('auth');
Route::get('/penjualan/{id}', [PenjualanController::class, 'penjualanDetail'])->middleware('auth');
Route::post('/penjualan/addpenjualan', [PenjualanController::class, 'addPenjualan'])->middleware('auth')->name('addPenjualan');
Route::post('/penjualan/editpenjualan/{id}', [PenjualanController::class, 'edit'])->middleware('auth');
Route::get('/penjualan/delete/{id}', [PenjualanController::class, 'deletePenjualan'])->middleware('auth')->name('deletePenjualan');
