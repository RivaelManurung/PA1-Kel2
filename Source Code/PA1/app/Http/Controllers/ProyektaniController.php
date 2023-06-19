<?php

namespace App\Http\Controllers;
use App\Models\ProyekTani;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProyekTaniController extends Controller
{
    /**
 * Menampilkan daftar proyek tani.
 *
 * @return \Illuminate\Http\Response
 */
public function index(Request $request)
{
    $search = $request->search;
    $proyekTani = ProyekTani::where('judul', 'like', '%' . $request->search . '%')
        ->orderBy('id', 'DESC')
        ->paginate(2);
    return view('proyekTani.proyekTani',compact('proyekTani'));
}

/**
 * Menampilkan formulir untuk membuat proyek tani baru.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
    return view('proyekTani.create');
}

/**
 * Menyimpan proyek tani yang baru dibuat ke dalam penyimpanan.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{
    // Validasi inputan menggunakan aturan yang ditentukan
    $request->validate([
        'judul' => 'required',
        'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        'deskripsi' => 'required'
    ]);

    // Mengunggah file gambar
    $file = $request->file('gambar');
    $namaFile = $file->getClientOriginalName();
    $tujuanFile = 'asset/gambar';

    $file->move($tujuanFile, $namaFile);

    // Membuat instance dari model ProyekTani dan mengisi atribut-atributnya
    $proyekTani=new ProyekTani;
    $proyekTani->judul= $request->judul;
    $proyekTani->gambar= $namaFile;
    $proyekTani->deskripsi= $request->deskripsi;
    $proyekTani->save();

    return redirect('proyekTani')->with('success', 'proyek Tani berhasil ditambahkan');
}

/**
 * Menampilkan halaman detail untuk proyek tani tertentu.
 *
 * @param  \App\Models\ProyekTani  $proyekTani
 * @return \Illuminate\Http\Response
 */
public function show(ProyekTani $proyekTani)
{
    return view('proyekTani.proyekTanian',compact('proyekTani'));
}

/**
 * Menampilkan formulir untuk mengedit proyek tani.
 *
 * @param  \App\Models\ProyekTani  $proyekTani
 * @return \Illuminate\Http\Response
 */
public function edit(ProyekTani $proyekTani)
{
    return view('proyekTani.edit',['data'=>$proyekTani]);
}

/**
 * Memperbarui proyek tani yang ada di dalam penyimpanan.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\ProyekTani  $proyekTani
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $proyekTani)
{
    // Validasi inputan menggunakan aturan yang ditentukan
    $request->validate([
        'judul' =>'required',
        'deskripsi' =>'required',
        'gambar' => 'image|mimes:jpg,png,jpeg,gif,svg'
    ]);

    // Mengupdate proyek tani berdasarkan ID
    if($request->hasfile('gambar')){
        $file = $request->file('gambar');
        $namaFile = $file->getClientOriginalName();
        $tujuanFile = 'asset/gambar';

        $file->move($tujuanFile, $namaFile);

        ProyekTani::where('id',$proyekTani)->update([
            'judul' => $request->judul,
            'gambar' =>  $namaFile,
            'deskripsi' =>  $request->deskripsi
        ]);
    }else{
        ProyekTani::where('id',$proyekTani)->update([
            'judul' => $request->judul,
            'deskripsi' =>  $request->deskripsi
        ]);
    }

    return redirect("proyekTani")->with('status','proyek Tani berhasil diubah');
}

/**
 * Menghapus proyek tani tertentu dari penyimpanan.
 *
 * @param  \App\Models\ProyekTani  $proyekTani
 * @return \Illuminate\Http\Response
 */
public function destroy(ProyekTani $proyekTani)
{
    $proyekTani->delete();
    return redirect('proyekTani')->with('success', 'proyek Tani berhasil dihapus');
}

}
