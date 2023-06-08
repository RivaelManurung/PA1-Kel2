<?php

namespace App\Http\Controllers;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $video = Video::where('judul', 'like', '%' . $search . '%')
            ->orderBy('id', 'DESC')
            ->paginate(3);
        return view('video.video', compact('video'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'video' => 'nullable|mimes:mp4|max:200000', // Adjust the max size limit as needed (in kilobytes)
            'link' => 'nullable|url'
        ]);

        $video = new Video;
        $video->judul = $request->judul;
        $video->deskripsi = $request->deskripsi;

        if ($request->hasFile('video')) {
            $videoFile = $request->file('video');
            $videoPath = $videoFile->store('videos', 'public');
            $video->video = $videoPath;
            $video->link = null; // Clear the link field if a video file is uploaded
        } elseif ($request->filled('link')) {
            $video->link = $request->link;
            $video->video = null; // Clear the video field if a YouTube link is provided
        }

        // Save the video to the database
        $video->save();

        return redirect()->route('video.index')->with('success', 'Video berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return view('video.videoan', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('video.edit',['data'=>$video]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'video' => 'nullable|mimes:mp4|max:200000', // Adjust the max size limit as needed (in kilobytes)
            'link' => 'nullable|url'
        ]);

        $video->judul = $request->judul;
        $video->deskripsi = $request->deskripsi;

        if ($request->hasFile('video')) {
            $videoFile = $request->file('video');
            $videoPath = $videoFile->store('videos', 'public');
            $video->video = $videoPath;
            $video->link = null; // Clear the link field if a video file is uploaded
        } elseif ($request->filled('link')) {
            $video->link = $request->link;
            $video->video = null; // Clear the video field if a YouTube link is provided
        }

        // Save the updated video to the database
        $video->save();

        return redirect("video")->with('status', 'Video berhasil diubah');
    }


    /**
     * Remove the specified resource from storage.
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
