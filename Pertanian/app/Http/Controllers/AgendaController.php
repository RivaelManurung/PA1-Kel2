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
         $agenda = agenda::where('kegiatan', 'like', '%' . $request->search . '%')
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
             'kegiatan' => 'required',
             'tanggal' => 'required',
             'jam' => 'required',
             'tempat' => 'required'
         ]);
         $file = $request->file('tanggal');
         $namaFile = $file->getClientOriginalName();
         $tujuanFile = 'asset/tanggal';
 
         $file->move($tujuanFile, $namaFile);
 
         $agenda=new agenda;
         $agenda->kegiatan= $request->kegiatan;
         $agenda->tanggal= $request->tanggal;
         $agenda->jam= $request->jam;
         $agenda->tempat= $request->tempat;

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
             'kegiatan' => 'required',
             'tanggal' => 'required',
             'jam' => 'required',
             'tempat' => 'required'
         ]);
         if($request->hasfile('tanggal')){
             $file = $request->file('tanggal');
             $namaFile = $file->getClientOriginalName();
             $tujuanFile = 'asset/tanggal';
     
             $file->move($tujuanFile, $namaFile);
     
             agenda::where('id', $agenda)->update([
                'kegiatan' => $request->kegiatan,
                'tanggal' => $request->tanggal,
                'jam' => $request->jam,
                'tempat' => $request->tempat,
            ]);
            
         }else{
             agenda::where('id',$agenda)->update([
                'kegiatan' => $request->kegiatan,
                'tanggal' => $request->tanggal,
                'jam' => $request->jam,
                'tempat' => $request->tempat,
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
