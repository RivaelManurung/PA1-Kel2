<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\EdukasiController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProyekTaniController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AlbumController;



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


Route::controller(AuthController::class)->group(function () {
    Route::get('/',[AuthController::class, 'login'])->name('auth.index');
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSimpan')->name('register.simpan');
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAksi')->name('login.aksi');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::get('/kontak',[BerandaController::class,'kontak'])->name('kontak');
Route::resource('edukasi', EdukasiController::class);
Route::resource('/barang', BarangController::class);
Route::resource('agenda', AgendaController::class);
Route::resource('album', AlbumController::class);
Route::resource('proyekTani', ProyekTaniController::class);
Route::get('/history',[HistoryController::class, 'index'])->name('history.index');
Route::patch('pinjam/{pinjam}/terima',[PinjamController::class,'terima'])->name('pinjam.terima');
Route::patch('pinjam/{pinjam}/tolak',[PinjamController::class,'tolak'])->name('pinjam.tolak');
Route::patch('pinjam/{pinjam}/denda',[PinjamController::class,'denda'])->name('pinjam.denda');
Route::prefix('pinjam/')->name('pinjam.')->group(function(){
    Route::get('',  [PinjamController::class, 'index'])->name('index');
    Route::get('show/{id}',[PinjamController::class, 'show'])->name('show');
    Route::post('store',[PinjamController::class, 'store'])->name('store');
});

Route::middleware('auth')->group(function () {
    Route::get('Beranda', function () {
        return view('Beranda');
    })->name('Beranda');

    // album
    
});
