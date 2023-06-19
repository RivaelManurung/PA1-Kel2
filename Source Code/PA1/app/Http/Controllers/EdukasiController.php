<?php

namespace App\Http\Controllers;

use App\Models\Edukasi;
use App\Http\Requests\StoreEdukasiRequest;
use App\Http\Requests\UpdateEdukasiRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
class EdukasiController extends Controller
{
    /**
     * Menampilkan daftar edukasi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Mengambil nilai pencarian dari request
        $search = $request->search;

        // Melakukan query untuk mencari edukasi berdasarkan judul dengan menggunakan fitur "like"
        $edukasi = Edukasi::where('judul', 'like', '%' . $request->search . '%')
            ->orderBy('id', 'DESC')
            ->paginate(5);

        // Mengembalikan view 'edukasi.edukasi' dengan data edukasi
        return view('edukasi.edukasi',compact('edukasi'));
    }

    /**
     * Menampilkan halaman pembuatan edukasi baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Mengembalikan view 'edukasi.create' untuk menampilkan halaman pembuatan edukasi baru
        return view('edukasi.create');
    }

    /**
     * Menyimpan edukasi yang baru dibuat ke dalam penyimpanan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Melakukan validasi inputan
        $request->validate([
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'deskripsi' => 'required'
        ]);

        // Mengunggah file gambar dan menyimpannya ke dalam direktori tujuan
        $file = $request->file('gambar');
        $namaFile = $file->getClientOriginalName();
        $tujuanFile = 'asset/gambar';
        $file->move($tujuanFile, $namaFile);

        // Membuat objek Edukasi baru dan mengisi nilainya dengan inputan dari form
        $edukasi = new Edukasi;
        $edukasi->judul = $request->judul;
        $edukasi->gambar = $namaFile;
        $edukasi->deskripsi = $request->deskripsi;

        // Menyimpan objek Edukasi ke dalam penyimpanan
        $edukasi->save();

        // Mengarahkan pengguna ke halaman 'edukasi' dengan pesan sukses
        return redirect('edukasi')->with('success', 'Edukasi berhasil ditambahkan');
    }

    /**
     * Menampilkan halaman detail edukasi.
     *
     * @param  \App\Models\Edukasi  $edukasi
     * @return \Illuminate\Http\Response
     */
    public function show(Edukasi $edukasi)
    {
        // Mengembalikan view 'edukasi.edukasian' dengan data edukasi yang spesifik
        return view('edukasi.edukasian',compact('edukasi'));
    }

    /**
     * Menampilkan halaman pengeditan edukasi.
     *
     * @param  \App\Models\Edukasi  $edukasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Edukasi $edukasi)
    {
        // Mengembalikan view 'edukasi.edit' dengan data edukasi yang akan diedit
        return view('edukasi.edit',['data'=>$edukasi]);
    }

    /**
     * Memperbarui edukasi yang ada dalam penyimpanan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Edukasi  $edukasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $edukasi)
    {
        // Melakukan validasi inputan
        $request->validate([
            'judul' =>'required',
            'deskripsi' =>'required',
            'gambar' =>'image|mimes:jpg,png,jpeg,gif,svg'
        ]);

        // Jika ada file gambar yang diunggah, mengunggahnya dan memperbarui data edukasi
        if($request->hasfile('gambar')){
            $file = $request->file('gambar');
            $namaFile = $file->getClientOriginalName();
            $tujuanFile = 'asset/gambar';
    
            $file->move($tujuanFile, $namaFile);
    
            Edukasi::where('id',$edukasi)->update([
                'judul' => $request->judul,
                'gambar' =>  $namaFile,
                'deskripsi' =>  $request->deskripsi
            ]);
        }
        // Jika tidak ada file gambar yang diunggah, hanya memperbarui data edukasi tanpa gambar
        else{
            Edukasi::where('id',$edukasi)->update([
                'judul' => $request->judul,
                'deskripsi' =>  $request->deskripsi
            ]);
        }

        // Mengarahkan pengguna ke halaman 'edukasi' dengan pesan sukses
        return redirect("edukasi")->with('status','Edukasi berhasil diubah');
    }

    /**
     * Menghapus edukasi yang ada dari penyimpanan.
     *
     * @param  \App\Models\Edukasi  $edukasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Edukasi $edukasi)
    {
        // Menghapus edukasi dari penyimpanan
        $edukasi->delete();

        // Mengarahkan pengguna ke halaman 'edukasi' dengan pesan sukses
        return redirect('edukasi')->with('success', 'Edukasi berhasil dihapus');
    }
}

