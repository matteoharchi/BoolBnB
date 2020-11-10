@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card-group">
      <div class="card m-4">
        <img class="card-img-top" src="{{$house->img}}" alt="{{$house->title}}">
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
    
</div>
@endsection
