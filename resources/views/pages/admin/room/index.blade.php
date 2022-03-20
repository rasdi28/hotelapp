@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    
    <a href="{{route('room.create')}}" class="btn btn-primary mb-3">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Add Room</span>
    </a>
    <div class="card shadow mb-4">
        @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" categories-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            {{ session('message') }}
          </div>
        @endif
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Room</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Type</th>
                            <th>Kapasitas</th>
                            <th>Harga</th>
                            <th>Action</th>
                            <td>Tambah Gambar</td>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rooms as $room)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$room->type->name}}</td>
                            <td>{{$room->capasity}}</td>
                            <td>Rp. {{number_format($room->price,2,',','.')}}</td>
                            <td>Update Delete</td>
                            <td>
                            <a href="{{route('image.add',$room->id)}}" type="button" class="btn btn-secondary">Tambah Gambar</a>
                            </td>
                        </tr> 

                        @empty

                        @endforelse
                    </tbody>
                  
                </table>
                
            </div>
        </div>
    </div>
</div>

@endsection