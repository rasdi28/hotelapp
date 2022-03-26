@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="center">
            <h3>Daftar Kamar</h3>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="card-deck">
                @foreach ($rooms as $room)
                <div class="col-md-4 mb-5">
                    <div class="card">
                        <img class="card-img-top" src="" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">{{$room->view}}</h5>
                          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                        <div class="card-footer">
                          <a href="{{route('transaction.show',$room->id)}}" class="btn btn-primary">Booking</a>
                        </div>
                      </div>
                </div>
                    
                @endforeach
            </div>
            
        </div>
    </div>

@endsection