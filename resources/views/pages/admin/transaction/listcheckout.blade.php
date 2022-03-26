@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="center">
            <h3>List Checkout</h3>
        </div>
    </div>

    <div class="container">
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
                                    <th>Nama </th>
                                    <th>No Telp</th>
                                    <th>Action</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($persons as $person)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$person->nama}}</td>
                                    <td>{{$person->no_telp}}</td>
                                    <td>
                                        <form action="{{route('transaction.keluar')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group" hidden>
                                                <input type="text" class="form-control" name="room_id" value="{{$person->room_id}}" >
                                                <input type="text" class="form-control" name="id" value="{{$person->id}}" > 
                                            </div>
                                            <button class="btn btn-primary btn-block" type="submit">
                                                Checkout
                                            </button>
                                    </form>
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