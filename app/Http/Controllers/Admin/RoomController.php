<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Images;
use App\Model\Room;
use App\Model\Room_statuses;
use App\Model\Types;
use Illuminate\Http\Request;

class RoomController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $rooms = Room::with('type')->get();
        return view('pages.admin.room.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roomstatus = Room_statuses::all();
        $types = Types::all();

        return view('pages.admin.room.create')->with([
            'types'=>$types,
            'roomstatus'=>$roomstatus
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $room = $request->all();
        // dd($room);
        Room::create($room);
        return redirect()->route('room.index');
    }

    public function tambahgambar($id)
    {
        $room = Room::findOrFail($id);
        return view('pages.admin.room.gambar')->with([
            'room'=>$room
        ]);
    }

    public function gambarstore(Request $request)
    {
       
        $gambar = $request->all();
        $gambar['url']= 'storage/'.$request->file('url')->store(
            'assets/image','public'
        );
        Images::create($gambar);
        return redirect('room.index');
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
