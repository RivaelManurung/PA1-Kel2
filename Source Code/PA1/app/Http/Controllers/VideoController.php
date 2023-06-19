<?php

namespace App\Http\Controllers;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class VideoController extends Controller
{
    /**
 * Menampilkan daftar video.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function index(Request $request)
{
    $search = $request->search;
    $video = Video::where('judul', 'like', '%' . $search . '%')
        ->orderBy('id', 'DESC')
        ->paginate(10);
    return view('video.video', compact('video'));
}

/**
 * Menampilkan formulir untuk membuat video baru.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
    return view('video.create');
}

/**
 * Menyimpan video yang baru dibuat ke dalam penyimpanan.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{
    // Validasi inputan menggunakan aturan yang ditentukan
    $request->validate([
        'judul' => 'required',
        'deskripsi' => 'required',
        'video' => 'nullable|mimes:mp4|max:200000', // Sesuaikan batas ukuran maksimal sesuai kebutuhan (dalam kilobita)
    ]);

    // Buat instance dari model Video
    $video = new Video;
    $video->judul = $request->judul;
    $video->deskripsi = $request->deskripsi;

    // Jika terdapat file video yang diunggah, simpan file video ke dalam penyimpanan
    if ($request->hasFile('video')) {
        $videoFile = $request->file('video');
        $videoPath = $videoFile->store('videos', 'public');
        $video->video = $videoPath;
    }

    // Simpan video ke dalam database
    $video->save();

    return redirect()->route('video.index')->with('success', 'Video berhasil ditambahkan');
}

/**
 * Menampilkan halaman detail untuk video tertentu.
 *
 * @param  \App\Models\Video  $video
 * @return \Illuminate\Http\Response
 */
public function show(Video $video)
{
    return view('video.videoan', compact('video'));
}

/**
 * Menampilkan formulir untuk mengedit video.
 *
 * @param  \App\Models\Video  $video
 * @return \Illuminate\Http\Response
 */
public function edit(Video $video)
{
    return view('video.edit',['data'=>$video]);

}

/**
 * Memperbarui video yang ada di dalam penyimpanan.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\Video  $video
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, Video $video)
{
    // Validasi inputan menggunakan aturan yang ditentukan
    $request->validate([
        'judul' => 'required',
        'deskripsi' => 'required',
        'video' => 'nullable|mimes:mp4|max:200000', // Sesuaikan batas ukuran maksimal sesuai kebutuhan (dalam kilobita)
    ]);

    $video->judul = $request->judul;
    $video->deskripsi = $request->deskripsi;

    // Jika terdapat file video yang diunggah, simpan file video ke dalam penyimpanan
    if ($request->hasFile('video')) {
        $videoFile = $request->file('video');
        $videoPath = $videoFile->store('videos', 'public');
        $video->video = $videoPath;
    }

    // Simpan video yang diperbarui ke dalam database
    $video->save();

    return redirect("video")->with('status', 'Video berhasil diubah');
}

/**
 * Menghapus video tertentu dari penyimpanan.
 *
 * @param  \App\Models\Video  $video
 * @return \Illuminate\Http\Response
 */
public function destroy(Video $video)
{
    $video->delete();
    return redirect('video')->with('success', 'Video berhasil dihapus');
}

}
