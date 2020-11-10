@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="title d-flex justify-content-center align-items-center">
            <h2>Gli appartamenti in evidenza</h2>
        </div>
        <div class="card-group">
          @foreach ($houses as $house)
              
          <div class="card m-4">
            <img class="card-img-top" src="{{$house->img}}" alt="{{$house->title}}">
            <div class="card-body">
              <h5 class="card-title">{{$house->title}}</h5>
              <p class="card-text">{{Str::substr($house->description, 0, 200). "..."}}
              </p>
            </div>
            <div class="card-footer">
             
            <a href="{{route('houses.show', $house->slug)}}" class="btn btn-success">Dettagli</a>
              <small class="text-muted">Ultima modifica alle {{$house->updated_at}}</small>

            </div>
          </div>
          @endforeach
        </div>
        {{ $houses->links() }}
    </div>
@endsection
