@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="card-group col-6">
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
      <div class="col-6">
        <form action="{{route('messages.store')}}" method="POST">
        @csrf
        @method('POST')
          <div class="form-group">
            <label for="email">Il tuo indirizzo mail</label>
          <input type="email" class="form-control" id="sender_mail" placeholder="porco@dio.com" value="{{Auth::check() ? Auth::user()->email : ''}}" name="sender_mail">
          </div>
          <div class="form-group">
          <input type="hidden" class="form-control" id="house_id"  value="{{$house->id}}" name="house_id">
          </div>
          <div class="form-group">
            <label for="object">Oggetto</label>
            <input type="text" class="form-control" id="object" placeholder="Inserisci il tuo cazzo di titolo" name="object">
          </div>

          <div class="form-group">
            <label for="body">Domanda</label>
            <textarea class="form-control" id="body" rows="6" name="body"></textarea>
          </div>
          <button type="submit" class="btn btn-primary float-right mt-3">Invia la tua domanda del cazzo</button>

        </form>
      </div>
    </div>

    {{-- Div contenente la mappa --}}
    <div id="map" style="width: 500px; height: 500px; margin: auto"></div>
    {{-- Script per la mappa (da mettere poi in app.js) --}}
    <script>
      var markerCoord = [{{$house->long}}, {{$house->lat}}];

      var map = tt.map({
          key: "oCyOS44obJmw9yb7z97dzeeAUwNmVWMq",
          container: "map",
          style: "tomtom://vector/1/basic-main",
          center: markerCoord,
          zoom: 12
      });

      var nav = new tt.NavigationControl({});
      map.addControl(nav, 'top-right');

      var marker = new tt.Marker()
      .setLngLat(markerCoord)
      .addTo(map);
      
   </script>


</div>
@endsection
