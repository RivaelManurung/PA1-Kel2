<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Peminjaman;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
            $pinjam = Peminjaman::where('nama', 'like', '%' . $request->search . '%')
            ->orWhere('alamat', 'like', '%' . $request->search . '%')
            ->orWhere('namaalat', 'like', '%' . $request->search . '%')
            ->orWhere('jumlah', 'like', '%' . $request->search . '%')
            ->orWhere('status', 'like', '%' . $request->search . '%')
            ->orWhere('tanggal_peminjaman', 'like', '%' . $request->search . '%')
            ->orWhere('tanggal_pemulangan', 'like', '%' . $request->search . '%')
            ->orderBy('id', 'DESC')
            ->paginate(4);
            return view('pages.web.history.list',compact('pinjam'));
    }
}
