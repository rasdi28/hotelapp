@extends('layouts.admin')

@section ('content')

<h3>Fasilitas</h3>
<div class="form-group">
    <label for="facilities" class="form-control-lable">Facilitas</label>
    <br>
    @foreach ($facilities as $facility)
    <input type="checkbox" name="" value="{{$facility->id}}" > {{$facility->name}} <p>
    @endforeach
</div>


@endsection