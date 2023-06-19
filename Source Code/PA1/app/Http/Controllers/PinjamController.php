<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Peminjaman;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    /**
     * Menampilkan daftar peminjaman atau daftar barang tergantung peran pengguna.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Memeriksa apakah pengguna memiliki peran 'admin'
        if(Auth::user()->hasRole('admin')){
            // Jika pengguna memiliki peran 'admin', melakukan pencarian pada tabel peminjaman berdasarkan beberapa kolom menggunakan fitur "like"
            $search = $request->search;
            $pinjam = Peminjaman::where('nama', 'like', '%' . $request->search . '%')
            ->orWhere('alamat', 'like', '%' . $request->search . '%')
            ->orWhere('namaalat', 'like', '%' . $request->search . '%')
            ->orWhere('jumlah', 'like', '%' . $request->search . '%')
            ->orWhere('status', 'like', '%' . $request->search . '%')
            ->orWhere('tanggal_peminjaman', 'like', '%' . $request->search . '%')
            ->orWhere('tanggal_pemulangan', 'like', '%' . $request->search . '%')
            ->orderBy('id', 'DESC')
            ->paginate(10);

            // Mengembalikan view 'pinjam.peminjaman' dengan data peminjaman
            return view('pinjam.peminjaman',compact('pinjam'));
        }else{
            // Jika pengguna tidak memiliki peran 'admin', menampilkan daftar barang dengan paginasi
            $barang = Barang::paginate(10);
            return view('pinjam.peminjaman',compact('barang'));
        }
    }
    
    /**
     * Menyimpan permintaan peminjaman baru ke dalam penyimpanan.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Mendapatkan informasi barang berdasarkan nama alat yang diminta
    $barang = Barang::where('nama', $request->namaalat)->first();

    // Memvalidasi permintaan peminjaman
    $request->validate([
        'namaalat' => 'required',
        'jumlah' => 'required|numeric|min:1',
        'tanggal_peminjaman' => 'required|date|after_or_equal:today',
        'tanggal_pemulangan' => 'required|date|after_or_equal:tanggal_peminjaman|before_or_equal:'.date('Y-m-d', strtotime('+7 days')),
    ]);

    // Memeriksa jika jumlah permintaan melebihi stok barang yang tersedia
    if ($request->jumlah > $barang->jumlah) {
        // Jika melebihi stok, mengembalikan ke halaman sebelumnya dengan pesan kesalahan
        return back()->with('success', 'Stok yang tersedia kurang');
    } else {
        // Jika stok mencukupi, menyimpan permintaan peminjaman ke dalam penyimpanan
        $pinjam = new Peminjaman;
        $pinjam->nama = auth::user()->nama;
        $pinjam->alamat = auth::user()->alamat;
        $pinjam->namaalat = $request->namaalat;
        $pinjam->jumlah = $request->jumlah;
        $pinjam->tanggal_peminjaman = $request->tanggal_peminjaman;
        $pinjam->tanggal_pemulangan = $request->tanggal_pemulangan;
        $pinjam->status = 'pending';
        $pinjam->user_id = Auth::user()->id;
        $pinjam->save();

        // Mengalihkan pengguna ke halaman 'barang' dengan pesan sukses
        return redirect('barang')->with('success', 'Permintaan pinjaman anda dikirim');
    }
}


/**
 * Menampilkan halaman detail peminjaman untuk barang tertentu.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
    $barang = Barang::where('id',$id)->first();
    return view('barang.pinjaman',compact('barang'));
}


/**
 * Mengubah status peminjaman menjadi 'terima' dan memperbarui jumlah barang yang tersedia.
 *
 * @param  \App\Models\Peminjaman  $pinjam
 * @return \Illuminate\Http\Response
 */
public function terima(Peminjaman $pinjam)
{
    $pinjam->status='terima';
    $pinjam->pemberitahuan='Anda diterima, Silahkan kembalikan alat sebelum '.$pinjam->tanggal_pemulangan.'. Keterlambatan pemulangan alat tani akan dikenakan denda!';
    $pinjam->update();
    $barang = Barang::where('nama', $pinjam->namaalat)->first();
    $barang->jumlah = $barang->jumlah - $pinjam->jumlah;
    $barang->update();
    return redirect('pinjam')->with('success', 'Permintaan pinjaman anda dikirim');
}

/**
 * Mengubah status peminjaman menjadi 'tolak'.
 *
 * @param  \App\Models\Peminjaman  $pinjam
 * @return \Illuminate\Http\Response
 */
public function tolak(Peminjaman $pinjam)
{
    $pinjam->status='tolak';
    $pinjam->pemberitahuan='Anda ditolak, dikarenakan anda belum membayar denda keterlambatan pemulangan alat tani. Silahkan periksa kembali histori peminjaman anda!';
    $pinjam->update();
    return redirect('pinjam')->with('success', 'Permintaan pinjaman anda dikirim');
}

/**
 * Mengubah status peminjaman menjadi 'denda'.
 *
 * @param  \App\Models\Peminjaman  $pinjam
 * @return \Illuminate\Http\Response
 */
public function denda(Peminjaman $pinjam)
{
    $pinjam->status='denda';
    $pinjam->pemberitahuan='Anda dikenakan denda, dikarenakan anda telah melewati batas waktu pengembalian alat tani. Silahkan hubungi pengurus tani untuk konfirmasi jumlah denda yang dikenakan.';
    $pinjam->update();
    return redirect('pinjam')->with('success', 'Permintaan pinjaman anda dikirim');
}
}