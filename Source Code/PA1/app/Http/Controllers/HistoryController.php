<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Peminjaman;

class HistoryController extends Controller
{
    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Mengambil nilai pencarian dari request
        $search = $request->search;

        // Melakukan query untuk mencari peminjaman berdasarkan beberapa kolom dengan menggunakan fitur "like"
        $pinjam = Peminjaman::where('nama', 'like', '%' . $request->search . '%')
            ->orWhere('alamat', 'like', '%' . $request->search . '%')
            ->orWhere('namaalat', 'like', '%' . $request->search . '%')
            ->orWhere('jumlah', 'like', '%' . $request->search . '%')
            ->orWhere('status', 'like', '%' . $request->search . '%')
            ->orWhere('tanggal_peminjaman', 'like', '%' . $request->search . '%')
            ->orWhere('tanggal_pemulangan', 'like', '%' . $request->search . '%')
            ->orderBy('id', 'DESC')
            ->paginate(5);

        // Mengembalikan view 'history.history' dengan data peminjaman
        return view('history.history',compact('pinjam'));
    }
}

