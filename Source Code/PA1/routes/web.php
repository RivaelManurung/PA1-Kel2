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
use App\Http\Controllers\VideoController;
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

Route::middleware('auth')->group(function () {
    // Route untuk halaman Beranda yang hanya dapat diakses oleh pengguna yang sudah terautentikasi
    Route::get('Beranda', function () {
        return view('Beranda');
    })->name('Beranda');
});

// Route untuk AuthController
Route::controller(AuthController::class)->group(function () {
    // Route untuk halaman utama, yaitu halaman login
    Route::get('/',[AuthController::class, 'login'])->name('auth.index');

    // Route untuk halaman registrasi
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSimpan')->name('register.simpan');

    // Route untuk proses login
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAksi')->name('login.aksi');

    // Route untuk logout
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

// Route untuk halaman kontak
Route::get('/kontak',[BerandaController::class,'kontak'])->name('kontak');

// Route resource untuk EdukasiController
Route::resource('edukasi', EdukasiController::class);

// Route resource untuk BarangController
Route::resource('/barang', BarangController::class);

// Route resource untuk AgendaController
Route::resource('agenda', AgendaController::class);

// Route resource untuk AlbumController
Route::resource('album', AlbumController::class);

// Route resource untuk VideoController
Route::resource('video', VideoController::class);

// Route resource untuk ProyekTaniController
Route::resource('proyekTani', ProyekTaniController::class);

// Route untuk halaman history
Route::get('/history',[HistoryController::class, 'index'])->name('history.index');

// Route dengan parameter dinamis {pinjam} untuk PinjamController
Route::patch('pinjam/{pinjam}/terima',[PinjamController::class,'terima'])->name('pinjam.terima');
Route::patch('pinjam/{pinjam}/tolak',[PinjamController::class,'tolak'])->name('pinjam.tolak');
Route::patch('pinjam/{pinjam}/denda',[PinjamController::class,'denda'])->name('pinjam.denda');

// Route dengan prefix 'pinjam/' dan menggunakan group untuk PinjamController menyatukan rute 
Route::prefix('pinjam/')->name('pinjam.')->group(function(){
    // Route untuk halaman indeks peminjaman
    Route::get('',  [PinjamController::class, 'index'])->name('index');
    
    // Route untuk menampilkan detail peminjaman dengan ID tertentu
    Route::get('show/{id}',[PinjamController::class, 'show'])->name('show');
    
    // Route untuk menyimpan data peminjaman
    Route::post('store',[PinjamController::class, 'store'])->name('store');
});
Route::get('barang/{id}', 'BarangController@show')->name('barang.show');

Route::get('blog', function () {
    return view('blog/blog');
});


