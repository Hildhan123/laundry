<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

// Route Umum
Route::get('/', [App\Http\Controllers\HomeController::class, 'landingPage'])->name('landing-page');

// Route Hildhan
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('adminDB')->middleware('admin');
Route::get('/admin/profil', [App\Http\Controllers\AdminController::class, 'profil'])->name('admin.profil');
Route::get('/admin/penjual', [App\Http\Controllers\AdminController::class, 'daftarPenjual'])->name('admin.penjual');
Route::get('/admin/pembeli', [App\Http\Controllers\AdminController::class, 'daftarPembeli'])->name('admin.pembeli');
Route::get('/admin/riwayat', [App\Http\Controllers\AdminController::class, 'riwayatOrder'])->name('admin.riwayat.order');
Route::get('/admin/inbox', [App\Http\Controllers\AdminController::class, 'inbox'])->name('admin.inbox');

// Route Gery

// Route Kadek

// Route Bawaan Auth
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
