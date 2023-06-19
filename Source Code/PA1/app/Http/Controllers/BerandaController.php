<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BerandaController extends Controller
{
    /**
     * Menampilkan halaman kontak.
     *
     * @return \Illuminate\Http\Response
     */
    public function kontak()
    {
        // Mengembalikan view 'kontak.kontak' untuk menampilkan halaman kontak
        return view('kontak.kontak');
    }
    
    /**
     * Mengupdate notifikasi dan mengurangi jumlah notifikasi pengguna.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function notif(Request $request)
    {
        // Mengambil nilai ID notifikasi dari request
        $notificationId = $request->input('id');

        // Mencari notifikasi berdasarkan ID dan menandainya sebagai telah dibaca
        $notification = Peminjaman::findOrFail($notificationId);
        $notification->pemberitahuan = null;
        $notification->save();

        // Mengurangi jumlah notifikasi untuk pengguna
        $totalNotifications = Peminjaman::where('user_id', auth()->user()->id)
            ->where('pemberitahuan', '!=', null)
            ->count();
        $totalNotifications--;

        // Mengembalikan respon JSON dengan jumlah notifikasi yang diperbarui
        return response()->json(['count' => $totalNotifications]);
    }
}
