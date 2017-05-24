<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Room;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $rooms = Room::paginate(15);

        return view('rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['IP' => 'required', 'channel' => 'required', 'status' => 'required', ]);

        Room::create($request->all());

        Session::flash('flash_message', 'Room added!');

        return redirect('rooms');
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
        $room = Room::findOrFail($id);

        return view('rooms.show', compact('room'));
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
        $room = Room::findOrFail($id);

        return view('rooms.edit', compact('room'));
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
        $this->validate($request, ['IP' => 'required', 'channel' => 'required', 'status' => 'required', ]);

        $room = Room::findOrFail($id);
        $room->update($request->all());

        Session::flash('flash_message', 'Room updated!');

        return redirect('rooms');
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
        Room::destroy($id);

        Session::flash('flash_message', 'Room deleted!');

        return redirect('rooms');
    }
}
