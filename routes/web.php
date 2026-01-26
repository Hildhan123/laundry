<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
Route::get('/dashboard', function () {
    $user = Auth::user();
    if ($user->peran == 'admin') {
        return redirect()->route('adminDB');
    } else {
        return view('dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
