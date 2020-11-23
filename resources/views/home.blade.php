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

          <div class="card apartment">
            <img class="card-img-top" src="{{Str::startsWith($house->img, 'http') ? $house->img : Storage::url($house->img)}}" alt="{{$house->title}}">
            <div class="card-body">
              <h5 class="card-title">{{$house->title}}</h5>
              <p class="card-text">{{ $house->description }}
              </p>
            </div>
            <div class="card-footer">
              @if (Auth::id() == $house->user_id)
                <a href="{{route('houses.show', $house->slug)}}" class="btn btnblue">Dettagli</a>
                  
              @else
                <form action="{{route('view.store')}}" method="POST">
                  @csrf
                  @method('POST')
                  <input type="hidden" name="house_id" value="{{$house->id}}">
                  <input type="hidden" name="slug" value="{{$house->slug}}">
                  <button type="submit" class="btn btnblue">Dettagli</button>
                </form>                
              @endif
              {{-- <small class="text-muted">Ultima modifica alle {{$house->updated_at}}</small> --}}
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

        <div class="col-4">
          <div class="row">
            <img src="https://images.pexels.com/photos/937481/pexels-photo-937481.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
          </div>
          <div class="row">
            <h4 class="col-12">Diventa un host</h4>
          </div>
        </div>

        <div class="col-4">
          <div class="row">
            <img src="https://images.pexels.com/photos/389818/pexels-photo-389818.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
          </div>
          <div class="row">
            <h4 class="col-12">Offri un' esperienza online</h4>
          </div>
        </div>

        <div class="col-4">
          <div class="row">
            <img src="https://images.pexels.com/photos/307008/pexels-photo-307008.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
          </div>
          <div class="row">
            <h4 class="col-12">Offri un' esperienza</h4>
          </div>
        </div>

      </div>

    </div>
@endsection
