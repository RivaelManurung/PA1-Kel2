<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Mengambil nilai dari parameter search pada request
        $search = $request->search;

        // Mencari data barang berdasarkan nama atau jumlah yang sesuai dengan nilai search
        $barang = Barang::where('nama', 'like', '%' . $search . '%')
            ->orWhere('jumlah', 'like', '%' . $search . '%')
            ->orderBy('id', 'DESC')
            ->paginate(6);

        // Mengembalikan view 'barang.barang' dengan data barang yang ditemukan
        return view('barang.barang', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Mengembalikan view 'barang.create' untuk menampilkan form pembuatan barang baru
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari request
        $request->validate([
            'nama' => 'required',
            'jumlah' => 'required',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg'
        ]);

        // Memindahkan file gambar yang diupload ke folder tujuan
        $file = $request->file('gambar');
        $namaFile = $file->getClientOriginalName();
        $tujuanFile = 'asset/gambar';
        $file->move($tujuanFile, $namaFile);

        // Membuat instance baru dari model Barang dan menyimpan data yang diterima dari request
        $barang = new Barang;
        $barang->nama = $request->nama;
        $barang->jumlah = $request->jumlah;
        $barang->gambar = $namaFile;
        $barang->save();

        // Mengarahkan pengguna ke halaman 'barang' dengan pesan sukses
        return redirect('barang')->with('success', 'Barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Mengambil data barang berdasarkan ID
        $barang = Barang::find($id);

        // Memeriksa apakah barang ditemukan
        if (!$barang) {
            // Redirect back with error message if barang is not found
            return redirect()->back()->with('error', 'Barang tidak ditemukan');
        }

        // Mengembalikan view 'barang.pinjaman' dengan data barang yang ingin ditampilkan
        return view('barang.pinjaman', ['barang' => $barang]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        // Mengembalikan view 'barang.edit' dengan data barang yang ingin diedit
        return view('barang.edit', ['barang' => $barang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        // Validasi data yang diterima dari request
        $request->validate([
            'nama' => 'required',
            'jumlah' => 'required',
            'gambar' => 'image|mimes:jpg,png,jpeg,gif,svg'
        ]);

        // Jika terdapat file gambar yang diupload, maka proses file tersebut
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = $file->getClientOriginalName();
            $tujuanFile = 'asset/gambar';
            $file->move($tujuanFile, $namaFile);

            // Update data barang dengan gambar baru
            $barang->update([
                'nama' => $request->nama,
                'jumlah' => $request->jumlah,
                'gambar' => $namaFile,
            ]);
        } else {
            // Update data barang tanpa mengubah gambar
            $barang->update([
                'nama' => $request->nama,
                'jumlah' => $request->jumlah,
            ]);
        }

        // Mengarahkan pengguna ke halaman 'barang' dengan pesan sukses
        return redirect("barang")->with('status', 'Barang berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        // Menghapus data barang
        $barang->delete();

        // Mengarahkan pengguna ke halaman 'barang' dengan pesan sukses
        return redirect('barang')->with('success', 'Barang berhasil dihapus');
    }
}
