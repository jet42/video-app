<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Models\Video;
use Auth;

class VideosController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()){
            $videos = Video::orderBy('id', 'desc')->get()->toArray();
            return json_encode($videos);
        } else {
            return view('videos.index');

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('videos.create');

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
            'title' => 'required|max:255',
            'file' => 'required',
        ]);

        $path = $request->file('file')->store('public/video_uploads', '', 'public');

        $file_path = storage_path()."/app/".$path;

        try {
            $getID3 = new \getID3;
            $file_analyzed = $getID3->analyze($file_path);
            $bitrate = $file_analyzed['bitrate'];
            $duration = $file_analyzed['playtime_seconds'];
            $filesize  = $file_analyzed['filesize'];
            $fileformat = $file_analyzed['fileformat'];

        } catch (\Exception $e){
            echo "not a valid mp4 file";
            return;
        }
        if ($fileformat !== 'mp4'){
            echo "only mp4 files are accepted";
            return;
        }

        Video::create([
            'user_id'=>Auth::user()->id,
            'name' => strip_tags($request->title),
            'bitrate' => $bitrate,
            'filesize'=> $filesize,
            'duration' => (int) $duration,
            'format' => $fileformat,
            'file_location'=> Storage::url($path)
        ]);


        return redirect('/videos')->with('msg', 'Video Uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
