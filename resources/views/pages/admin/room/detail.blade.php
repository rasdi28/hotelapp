@extends('layouts.admin')
@section('title','show')
@section('content')

<div class="detail">

<div class="row">
    <div class="col-md-4">
    <div id="caraouselExampleCaptions" class="carousel slide" data-ride="carousel" >
        <div class="carousel-inner">
        @php $i = 1; @endphp
        @foreach ($images as $image)
        <div class="carousel-item {{ $i=='1' ? 'active':''}}">
            @php $i++; @endphp
            <img src="{{asset($image->url)}}" class="d-block w-100 " alt="slider image">

        </div>
        @endforeach
        </div>
        <a class="carousel-control-prev" href="#caraouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#caraouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    </div>
     <div class="col-md-8">
          <div class="card mr-5">
               <div class="card-header bg-primary text-white">
                    <h4>{{$room->type->name}}</h4>
               </div>
               <div class="card-body">
               </div>
               
          </div>

     </div>
</div>


</div>


    
@endsection