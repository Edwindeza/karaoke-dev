<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Song;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

use App\Services\File\UploadVideoService;

class SongsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */

    public function __construct(){
        $this->file_service = new UploadVideoService;
    }

    public function index()
    {
        $songs = Song::paginate(15);

        return view('songs.index', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('songs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['code' => 'required']);

        $code = $request->input('code');

        $cdg_src = $this->file_service->upload($request->file('cdg'), $code);
        $mp3_src = $this->file_service->upload($request->file('mp3'), $code);
        
        $data = [
            'code'      => $code,
            'cdg'       => $cdg_src,
            'mp3'       => $mp3_src,
        ];

        Song::create($data);

        Session::flash('flash_message', 'Song added!');

        return redirect('songs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $song = Song::findOrFail($id);

        return view('songs.show', compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $song = Song::findOrFail($id);

        return view('songs.edit', compact('song'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['code' => 'required', 'artist' => 'required', 'title' => 'required', ]);

        $song = Song::findOrFail($id);
        $song->update($request->all());

        Session::flash('flash_message', 'Song updated!');

        return redirect('songs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        Song::destroy($id);

        Session::flash('flash_message', 'Song deleted!');

        return redirect('songs');
    }

    public function check($code)
    {
        $song = Song::where('code', $code)->first();
        return response()->json($song);
    }
}
