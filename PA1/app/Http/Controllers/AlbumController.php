<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $album = Album::where('judul', 'like', '%' . $request->search . '%')
        ->orderBy('id', 'DESC')
        ->paginate(12);
        return view('album.album', compact('album'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('album.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Htt  p\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);
        $file = $request->file('gambar');
        $namaFile = $file->getClientOriginalName();
        $tujuanFile = 'asset/album';

        $file->move($tujuanFile, $namaFile);

        $album=new Album;
        $album->judul= $request->judul;
        $album->gambar= $namaFile;
        $album->save();
        return redirect('album')->with('success', 'album berhasil ditambahkan');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        return view('album.albuman',compact('album'));
    }

  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        return view('album.edit',['data'=>$album]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $album)
    {
        $request->validate([
            'judul' =>'required',
            'gambar' =>'image|mimes:jpg,png,jpeg,gif,svg'
        ]);
        if($request->hasfile('gambar')){
            $file = $request->file('gambar');
            $namaFile = $file->getClientOriginalName();
            $tujuanFile = 'asset/album';
    
            $file->move($tujuanFile, $namaFile);
    
            Album::where('id',$album)->update([
                'judul' => $request->judul,
                'gambar' =>  $namaFile,
            ]);
        }else{
            Album::where('id',$album)->update([
                'judul' => $request->judul,
            ]);
        }

        return redirect("album")->with('status','album berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $album->delete();
        return redirect('album')->with('success', 'album berhasil dihapus');
    }

}
