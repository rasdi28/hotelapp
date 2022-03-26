<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Room;
use App\Model\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::with('type')->where('room_status','=','0')->get();
        return view('pages.admin.transaction.index')->with([
            'rooms'=>$rooms
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
       
        $transaction = $request->all();
        $transaction['checkout'] = '0000-00-00';
        $transaction['room_id'] = $request->room_id;
        // return $transaction;
        Transaksi::create($transaction);
        Room::where('id',$transaction['room_id'])->update(['room_status'=>'1']);

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
        $room = Room::findOrFail($id);
        return view('pages.admin.transaction.detail')->with([
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
        $transaction = Transaksi::findOrFail($id);
        return view('pages.admin.transaction.edit')->with([
            'transaction'=>$transaction
        ]);
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

    public function checkout(){

        $persons = DB::table('transaksis')->where('checkout','=','0000-00-00')->get();
        return view('pages.admin.transaction.listcheckout')->with([
            'persons'=>$persons
        ]);
    }

    public function keluar(Request $request){
        $person['checkout'] = Carbon::now()->format('Y-m-d H:i:s');
        $room = $request->all();
        Transaksi::where('id',$room['id'])->update(['checkout'=>$person['checkout']]);
        Room::where('id',$room['room_id'])->update(['room_status'=>'0']);
        return redirect()->route('room.index');
        
    }
}
