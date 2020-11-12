@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card-group">
      <div class="card m-4">
        <img class="card-img-top" src="{{Str::startsWith($house->img, 'http') ? $house->img : Storage::url($house->img)}}" alt="{{$house->title}}" alt="{{$house->title}}">
        <div class="card-body">
          <h5 class="card-title">{{$house->title}}</h5>
          <p class="card-text">{{Str::substr($house->description, 0, 200). "..."}}
          </p>
        </div>
        <div class="card-footer">
          <small class="text-muted">Last updated at {{$house->updated_at}}</small>
        </div>
      </div>
    </div>
    <form action="{{route('houses.destroy', $house->id)}}" method="post">
    @csrf
    @method('DELETE')
      <button type="submit" class="btn btn-danger">Cancella</button>
    </form>

</div>
@endsection
