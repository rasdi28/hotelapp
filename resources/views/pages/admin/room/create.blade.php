@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        
       {{-- form --}}
        <div class="card">
            <div class="card-header">
                <h4 class="m-0 font-weight-bold text-primary">Create Room</h4>
            </div>
    
            <div class="card-body card-block">
                <form action="{{route('room.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                     <div class="form-group">
                        <label for="type_id" class="form-control-lable">Type  </label>
                        <select name="type_id" class="form-control  @error('type_id') is-invalid @enderror">
                            @foreach ($types as $type)
                                <option value="{{ $type->id}}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="number" class="form-control-lable">Number</label>
                        <input type="text" class="form-control" name="number">
                    </div>
                    <div class="form-group">
                        <label for="capacity" class="form-control-lable">Capacity</label>
                        <input type="number" class="form-control" name="capasity">
                    </div>

                    <div class="form-group">
                        <label for="harga" class="form-control-lable">Price</label>
                        <input type="number" class="form-control" name="price">
                    </div>
                    <div class="form-group">
                        <label for="view" class="form-control-lable">View</label>
                        <input type="text" class="form-control" name="view">
                    </div>
                    <div class="form-group">
                        <label for="type_id" class="form-control-lable">Room Status</label>
                        <select name="room_status_id" class="form-control  @error('room_status_id') is-invalid @enderror">
                            @foreach ($roomstatus as $roomst)
                                <option value="{{ $roomst->id}}">{{ $roomst->name }}</option>
                            @endforeach
                        </select>
                    </div>
    
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">
                            Tambah Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
     

    </div>



    
@endsection