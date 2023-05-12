<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Http\Requests\StoreAgendaRequest;
use App\Http\Requests\UpdateAgendaRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AgendaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function index(Request $request)
     {
         $search = $request->search;
         $agenda = agenda::where('judul', 'like', '%' . $request->search . '%')
         ->orderBy('id', 'DESC')
         ->paginate(3);
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
         $request->validate([
             'judul' => 'required',
             'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
             'deskripsi' => 'required'
         ]);
         $file = $request->file('gambar');
         $namaFile = $file->getClientOriginalName();
         $tujuanFile = 'asset/gambar';
 
         $file->move($tujuanFile, $namaFile);
 
         $agenda=new agenda;
         $agenda->judul= $request->judul;
         $agenda->gambar= $namaFile;
         $agenda->deskripsi= $request->deskripsi;
         $agenda->save();
         return redirect('agenda')->with('success', 'agenda berhasil ditambahkan');
       
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
         $request->validate([
             'judul' =>'required',
             'deskripsi' =>'required',
             'gambar' =>'image|mimes:jpg,png,jpeg,gif,svg'
         ]);
         if($request->hasfile('gambar')){
             $file = $request->file('gambar');
             $namaFile = $file->getClientOriginalName();
             $tujuanFile = 'asset/gambar';
     
             $file->move($tujuanFile, $namaFile);
     
             agenda::where('id',$agenda)->update([
                 'judul' => $request->judul,
                 'gambar' =>  $namaFile,
                 'deskripsi' =>  $request->deskripsi
             ]);
         }else{
             agenda::where('id',$agenda)->update([
                 'judul' => $request->judul,
                 'deskripsi' =>  $request->deskripsi
             ]);
         }
 
         return redirect("agenda")->with('status','agenda berhasil diubah');
 
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
