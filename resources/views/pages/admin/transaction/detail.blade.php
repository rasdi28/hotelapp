@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="m-0 font-weight-bold text-primary">Pemesanan Kamar {{$room->view}}</h4>
            </div>
    
            <div class="card-body card-block">
                <form action="{{route('transaction.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <label for="view" class="form-control-lable">Nama Penginap</label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="view" class="form-control-lable">No Telephon</label>
                        <input type="text" class="form-control" name="no_telp">
                    </div>
                    <div class="form-group" hidden>
                        <label for="view" class="form-control-lable">Nama Kamar</label>
                        <input type="text" class="form-control" name="room_id" value="{{$room->id}}" > 
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">
                            Booking
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection