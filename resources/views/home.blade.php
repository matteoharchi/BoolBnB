@extends('layouts.app')

@section('content')

    <div class="container">

      {{-- row-title --}}

      <div class="row title">

            <h2 class="col-12">Appartamenti in evidenza</h2>

      </div>

      {{-- row-view --}}

      <div class="row view">

        <div class="card-group scrollMenu col-12">

          @foreach ($houses as $house)

          <div class="card apartment mr-4 mt-4 mb-4 ombra">
            <img class="card-img-top" src="{{Str::startsWith($house->img, 'http') ? $house->img : Storage::url($house->img)}}" alt="{{$house->title}}">
            <div class="card-body">
              <h5 class="card-title">{{$house->title}}</h5>
              <p class="card-text">{{ Str::substr($house->description, 0, 200) . "..." }}</p>
            </div>
            <div class="card-footer">
              @if (Auth::id() == $house->user_id)
                <a href="{{route('houses.show', $house->slug)}}" class="btn btn-white float-right">Dettagli</a>
                  
              @else
                <form action="{{route('view.store')}}" method="POST">
                  @csrf
                  @method('POST')
                  <input type="hidden" name="house_id" value="{{$house->id}}">
                  <input type="hidden" name="slug" value="{{$house->slug}}">
                  <button type="submit" class="btn btn-white float-right">Dettagli</button>
                </form>                
              @endif
            </div>
          </div>

          @endforeach

        </div>

      </div>

      {{-- row-title --}}

      <div class="row title">

        <h2 class="col-12">Unisciti a milioni di host su Boolbnb</h2>

      </div>

      {{-- row-host --}}

      <div class="row host">

        <div class="col-12">
          <img src="{{ asset('/images/host.jpg') }}" alt="" class="ombra">
        </div>

      </div>

    </div>
@endsection
