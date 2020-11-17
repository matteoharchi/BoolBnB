@extends('layouts.app')
@section('content')

    {{-- container main --}}

    <div class="container-main d-flex flex-column">

      {{-- container-title --}}

        <div class="container-title d-flex justify-content-center align-items-center">
          <h2>Appartamenti in evidenza</h2>
        </div>

        {{-- container-card --}}

      <div class="container-card d-flex align-items-center pt-0 pb-0">

        <div class="card-group">

          @foreach ($houses as $house)
              
          <div class="card">
            <img class="card-img-top rounded" src="{{Str::startsWith($house->img, 'http') ? $house->img : Storage::url($house->img)}}" alt="{{$house->title}}">
            <div class="card-body">
              <h5 class="card-title">{{$house->title}}</h5>
              <p class="card-text">{{Str::substr($house->description, 0, 200). "..."}}
              </p>
            </div>
            <div class="card-footer">
             
            <a href="{{route('houses.show', $house->slug)}}" class="btn btnred">Dettagli</a>
              <small class="text-muted">Ultima modifica alle {{$house->updated_at}}</small>

            </div>
          </div>

          @endforeach

        </div>

      </div>

        <div class="container-pagination d-flex">
          {{ $houses->links() }}
        </div>

    </div>
@endsection
