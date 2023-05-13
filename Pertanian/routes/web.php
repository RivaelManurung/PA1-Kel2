<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\EdukasiController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProyekTaniController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\AgendaController;



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


// membuat grup middleware auth
Route::middleware('auth')->group(function () {

    // route untuk halaman Beranda
    Route::get('Beranda', function () {
        return view('Beranda');
    })->name('Beranda');

    // mengatur rute untuk auth controller
    Route::controller(AuthController::class)->group(function () {

        // halaman login
        Route::get('/',[AuthController::class, 'login'])->name('auth.index');

        // halaman register
        Route::get('register', 'register')->name('register');
        Route::post('register', 'registerSimpan')->name('register.simpan');

        // proses login
        Route::get('login', 'login')->name('login');
        Route::post('login', 'loginAksi')->name('login.aksi');

        // proses logout
        Route::get('logout', 'logout')->middleware('auth')->name('logout');
    });

    // rute untuk halaman kontak
    Route::get('/kontak',[BerandaController::class,'kontak'])->name('kontak');

    // resource controller untuk halaman edukasi, barang, dan agenda
    Route::resource('edukasi', EdukasiController::class);
    Route::resource('/barang', BarangController::class);
    Route::resource('agenda', AgendaController::class);

    // resource controller untuk halaman proyekTani
    Route::resource('proyekTani', ProyekTaniController::class);

    // halaman riwayat peminjaman
    Route::get('/history',[HistoryController::class, 'index'])->name('history.index');

    // proses peminjaman
    Route::patch('pinjam/{pinjam}/terima',[PinjamController::class,'terima'])->name('pinjam.terima');
    Route::patch('pinjam/{pinjam}/tolak',[PinjamController::class,'tolak'])->name('pinjam.tolak');
    Route::patch('pinjam/{pinjam}/denda',[PinjamController::class,'denda'])->name('pinjam.denda');

    // rute untuk halaman peminjaman
    Route::prefix('pinjam/')->name('pinjam.')->group(function(){
        Route::get('',  [PinjamController::class, 'index'])->name('index');
        Route::get('show/{id}',[PinjamController::class, 'show'])->name('show');
        Route::post('store',[PinjamController::class, 'store'])->name('store');
    });
});
