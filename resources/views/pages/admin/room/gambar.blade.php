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
                <form action="{{route('gambar.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <input type="hidden" class="form-control" id="room_id" value="{{$room->id}}" placeholder="Enter name" name="room_id" >
                    </div>
                    <div class="form-group">
                        <label for="Photo">Image</label>
                        <input type="file" name="url" class="form-control" id="">
                    </div>
    
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">
                            Tambah gambar
                        </button>
                    </div>
                </form>
            </div>
        </div>
     

    </div>



    
@endsection