<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Http\Controllers\Controller;


class AgendaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function index(Request $request)
     {
         // Mengambil nilai dari input search pada request
         $search = $request->search;
     
         // Mengambil data agenda berdasarkan kriteria pencarian
         $agenda = agenda::where('kegiatan', 'like', '%' . $request->search . '%')
             ->orderBy('id', 'DESC')
             ->paginate(6);
     
         // Mengirim data agenda ke view agenda
         return view('agenda.agenda',compact('agenda'));
     }
     
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         return view('agenda.create');
     }
 
     /**
      * Store a newly created resource in storage.
      *
      * @param  \App\Http\Requests\StoreagendaRequest  $request
      * @return \Illuminate\Http\Response
      */
      public function store(Request $request)
      {
          // Validasi data yang diterima dari request
          $request->validate([
              'kegiatan' => 'required',
              'tanggal' => 'required',
              'jam' => 'required',
              'tempat' => 'required'
          ]);
      
          // Membuat instance baru dari model agenda
          $agenda = new agenda;
      
          // Mengisi nilai atribut kegiatan, tanggal, jam, dan tempat dari request
          $agenda->kegiatan = $request->kegiatan;
          $agenda->tanggal = $request->tanggal;
          $agenda->jam = $request->jam;
          $agenda->tempat = $request->tempat;
      
          // Menyimpan data agenda ke dalam database
          $agenda->save();
      
          // Redirect ke halaman agenda dengan pesan sukses
          return redirect('agenda')->with('success', 'Agenda berhasil ditambahkan');
      }
      
 
     /**
      * Display the specified resource.
      *
      * @param  \App\Models\Agenda  $agenda
      * @return \Illuminate\Http\Response
      */
     public function show(agenda $agenda)
     {
         return view('agenda.agendaan',compact('agenda'));
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Models\Agenda  $agenda
      * @return \Illuminate\Http\Response
      */
     public function edit(agenda $agenda)
     {
         return view('agenda.edit',['data'=>$agenda]);
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \App\Http\Requests\UpdateagendaRequest  $request
      * @param  \App\Models\Agenda  $agenda
      * @return \Illuminate\Http\Response
      */
      public function update(Request $request, $agenda)
      {
          // Validasi data yang diterima dari request
          $request->validate([
              'kegiatan' => 'required',
              'tanggal' => 'required',
              'jam' => 'required',
              'tempat' => 'required'
          ]);
      
          // Cek apakah ada file yang diunggah pada request
          if ($request->hasFile('tanggal')) {
              // Mengambil file dari request
              $file = $request->file('tanggal');
              // Mengambil nama asli file
              $namaFile = $file->getClientOriginalName();
              // Menentukan lokasi tujuan penyimpanan file
              $tujuanFile = 'asset/tanggal';
      
              // Memindahkan file ke lokasi tujuan
              $file->move($tujuanFile, $namaFile);
      
              // Memperbarui data agenda di database dengan file tanggal yang baru
              agenda::where('id', $agenda)->update([
                  'kegiatan' => $request->kegiatan,
                  'tanggal' => $request->tanggal,
                  'jam' => $request->jam,
                  'tempat' => $request->tempat,
                  'file_tanggal' => $namaFile,
              ]);
          } else {
              // Memperbarui data agenda di database tanpa file tanggal
              agenda::where('id', $agenda)->update([
                  'kegiatan' => $request->kegiatan,
                  'tanggal' => $request->tanggal,
                  'jam' => $request->jam,
                  'tempat' => $request->tempat,
              ]);
          }
      
          // Redirect ke halaman agenda dengan pesan status
          return redirect("agenda")->with('status', 'Agenda berhasil diubah');
      }
      
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Models\Agenda  $agenda
      * @return \Illuminate\Http\Response
      */
     public function destroy(agenda $agenda)
     {
         $agenda->delete();
         return redirect('agenda')->with('success', 'agenda berhasil dihapus');
     }
}
