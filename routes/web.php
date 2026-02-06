<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\UmumController;

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
Route::get('/', [App\Http\Controllers\UmumController::class, 'landingPage'])->name('landing-page');
Route::get('/pesan', [App\Http\Controllers\UmumController::class, 'pesanPaket'])->name('pesan-paket');
Route::post('/pesan', [App\Http\Controllers\UmumController::class, 'cariPesan'])->name('cari.pesan');
Route::get('/tentang-kami', [App\Http\Controllers\UmumController::class, 'tentangKami'])->name('tentang.kami');
Route::get('/bantuan', [App\Http\Controllers\UmumController::class, 'support'])->name('bantuan');
Route::get('/pesan/{paket}', [App\Http\Controllers\UmumController::class, 'paketDetail']);
Route::get('/pesan/{paket}/buat-pesanan', [App\Http\Controllers\UmumController::class, 'buatPesanan'])->name('buatPesanan')->middleware('pembeli','auth');
Route::post('/pembeli', [App\Http\Controllers\UmumController::class, 'prosesPesanan'])->name('proses-pesanan')->middleware('pembeli','auth');


// Route Admin and user
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('adminDB');
Route::get('/admin/user/buat', [App\Http\Controllers\AdminController::class, 'buatUser'])->name('user.buat');
Route::post('/admin/user', [App\Http\Controllers\AdminController::class, 'prosesBuatUser'])->name('user.buat.proses');
Route::get('/admin/user/edit/{user}', [App\Http\Controllers\AdminController::class, 'editUser'])->name('user.edit');
Route::patch('/admin/user', [App\Http\Controllers\AdminController::class, 'prosesEditUser'])->name('user.edit.proses');
Route::get('/admin/user/delete/{user}', [App\Http\Controllers\AdminController::class, 'deleteUser'])->name('user.delete');

//Route Admin Profil
Route::get('/admin/profil', [App\Http\Controllers\AdminController::class, 'myprofil'])->name('admin.profil');
Route::get('/admin/profil/buat', [App\Http\Controllers\AdminController::class, 'buatProfil'])->name('admin.buat.profil');
Route::post('/admin/profil', [App\Http\Controllers\AdminController::class, 'prosesBuatProfil'])->name('admin.buat.profil.proses');
Route::get('/admin/profil/edit', [App\Http\Controllers\AdminController::class, 'editProfil'])->name('admin.edit.profil');
Route::patch('/admin/profil', [App\Http\Controllers\AdminController::class, 'prosesEditProfil'])->name('admin.edit.profil.proses');

//Route daftar admin
Route::get('/admin/user', [App\Http\Controllers\AdminController::class, 'daftarUser'])->name('admin.user');
Route::get('/admin/penjual', [App\Http\Controllers\AdminController::class, 'daftarPenjual'])->name('admin.penjual');
Route::get('/admin/penjual/delete/{penjual}', [App\Http\Controllers\AdminController::class, 'deletePenjual'])->name('admin.penjual.delete');
Route::get('/admin/toko', [App\Http\Controllers\AdminController::class, 'daftarToko'])->name('admin.toko');
Route::get('/admin/toko/delete/{toko}', [App\Http\Controllers\AdminController::class, 'deleteToko'])->name('admin.toko.delete');
Route::get('/admin/paket', [App\Http\Controllers\AdminController::class, 'daftarPaket'])->name('admin.paket');
Route::get('/admin/paket/delete/{paket}', [App\Http\Controllers\AdminController::class, 'deletePaket'])->name('admin.paket.delete');
Route::get('/admin/pembeli', [App\Http\Controllers\AdminController::class, 'daftarPembeli'])->name('admin.pembeli');
Route::get('/admin/pembeli/delete/{pembeli}', [App\Http\Controllers\AdminController::class, 'deletePembeli'])->name('admin.pembeli.delete');
Route::get('/admin/riwayat', [App\Http\Controllers\AdminController::class, 'riwayatOrder'])->name('admin.riwayat.order');
Route::get('/admin/riwayat/delete/{riwayat}', [App\Http\Controllers\AdminController::class, 'deleteRiwayatOrder'])->name('admin.riwayat.order.delete');
Route::get('/admin/inbox', [App\Http\Controllers\AdminController::class, 'inbox'])->name('admin.inbox');

// Route penjual
Route::get('/penjual', [App\Http\Controllers\PenjualController::class, 'index'])->name('penjual.index');
Route::get('/penjual/profil', [App\Http\Controllers\PenjualController::class, 'myprofil'])->name('penjual.profil');
Route::get('/penjual/profil/buat', [App\Http\Controllers\PenjualController::class, 'buatProfil'])->name('penjual.buat.profil');
Route::post('/penjual/profil', [App\Http\Controllers\PenjualController::class, 'prosesBuatProfil'])->name('penjual.buat.profil.proses');
Route::get('/penjual/profil/edit', [App\Http\Controllers\PenjualController::class, 'editProfil'])->name('penjual.edit.profil');
Route::patch('/penjual/profil', [App\Http\Controllers\PenjualController::class, 'prosesEditProfil'])->name('penjual.edit.profil.proses');
Route::get('/penjual/riwayat', [App\Http\Controllers\PenjualController::class, 'riwayatOrder'])->name('penjual.riwayat.order');
Route::get('/penjual/riwayat/edit/{riwayat}',[App\Http\Controllers\PenjualController::class, 'editRiwayatOrder'])->name('penjual.riwayat.order.edit');
Route::post('/penjual/riwayat',[App\Http\Controllers\PenjualController::class, 'ProsesEditRiwayatOrder'])->name('penjual.riwayat.order.edit.proses');

// Route Penjual Toko

Route::get('/penjual/mytoko', [App\Http\Controllers\PenjualController::class, 'mytoko'])->name('my.toko');
Route::get('/penjual/mytoko/buat', [App\Http\Controllers\PenjualController::class, 'bukatoko'])->name('buka.toko');
Route::post('/penjual/mytoko', [App\Http\Controllers\PenjualController::class, 'prosesbuattoko'])->name('buka.toko.proses');
Route::get('/penjual/mytoko/edit', [App\Http\Controllers\PenjualController::class, 'edittoko'])->name('edit.toko');
Route::patch('/penjual/mytoko', [App\Http\Controllers\PenjualController::class, 'prosesedittoko'])->name('edit.toko.proses');
Route::get('/penjual/galeri', [App\Http\Controllers\PenjualController::class, 'buatgaleri'])->name('buat.galeri');
Route::post('/penjual/galeri', [App\Http\Controllers\PenjualController::class, 'prosesbuatgaleri'])->name('buat.galeri.proses');

//Route Penjual Paket
Route::get('/penjual/mytoko/buatpaket', [App\Http\Controllers\PenjualController::class, 'buatPaket'])->name('buat.paket');
Route::post('/penjual/mytoko/buatpaket', [App\Http\Controllers\PenjualController::class, 'prosesBuatPaket'])->name('buat.paket.proses');
Route::get('/penjual/mytoko/edit/{paket}', [App\Http\Controllers\PenjualController::class, 'editPaket'])->name('edit.paket');
Route::patch('/penjual/mytoko/edit/', [App\Http\Controllers\PenjualController::class, 'prosesEditPaket'])->name('edit.paket.proses');
Route::get('/penjual/mytoko/delete/{paket}', [App\Http\Controllers\PenjualController::class, 'deletePaket'])->name('delete.paket');

// Route Pembeli
Route::get('/pembeli', [App\Http\Controllers\PembeliController::class, 'index'])->name('pembeli.index');
Route::get('/pembeli/profil', [App\Http\Controllers\PembeliController::class, 'myprofil'])->name('pembeli.profil');
Route::get('/pembeli/profil/buat', [App\Http\Controllers\PembeliController::class, 'buatProfil'])->name('pembeli.buat.profil');
Route::post('/pembeli/profil', [App\Http\Controllers\PembeliController::class, 'prosesBuatProfil'])->name('pembeli.buat.profil.proses');
Route::get('/pembeli/profil/edit', [App\Http\Controllers\PembeliController::class, 'editProfil'])->name('pembeli.edit.profil');
Route::patch('/pembeli/profil', [App\Http\Controllers\PembeliController::class, 'prosesEditProfil'])->name('pembeli.edit.profil.proses');
Route::get('/pembeli/riwayat', [App\Http\Controllers\PembeliController::class, 'riwayatOrder'])->name('pembeli.riwayat.order');
Route::get('/pembeli/riwayat/cancel/{riwayat}', [App\Http\Controllers\PembeliController::class, 'cancelRiwayatOrder'])->name('pembeli.riwayat.order.cancel');


// Route Bawaan Auth
Route::get('/dashboard', function () {
    $user = Auth::user();
    $peran = $user->peran;
    if($peran == "admin"){
            return redirect()->route('adminDB');
        } else if($peran == "pembeli"){
            return redirect()->route('pembeli.index');
        } else if($peran == "penjual"){
            return redirect()->route('penjual.index'); 
        } else {
            return redirect()->route('logout');
        }
})->middleware([])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
