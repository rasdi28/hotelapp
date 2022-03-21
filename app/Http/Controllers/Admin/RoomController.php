<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Facilities;
use App\Model\Facility_room;
use App\Model\Images;
use App\Model\Room;
use App\Model\Room_statuses;
use App\Model\Types;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $facilities = Facilities::all();

        return view('pages.admin.room.create')->with([
            'types'=>$types,
            'roomstatus'=>$roomstatus,
            'facilities'=>$facilities
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
        $test['facility_id'] = $room['facilities'];
        $room = Room::create($room);
        $test['room_id']= $room->id;
        
        
        foreach ($test['facility_id'] as $item){
            $facilitas['facility_id']= $item;
            $facilitas['room_id']= $room->id;
            Facility_room::create($facilitas);
        }
       
    //    dd($facilitas);
    //    dd($test);

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
        return redirect()->route('room.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $images = DB::table('images')->where('room_id', $id)->get();
        $room = Room::findOrFail($id);
        return view('pages.admin.room.detail')->with([
            'images'=>$images,
            'room'=>$room
        ]);
       
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
