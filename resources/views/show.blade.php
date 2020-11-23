@extends('layouts.authlayout')
@section('content')

<div class="container show-house">

  {{-- row-casa --}}

    <div class="row">

      {{-- card casa --}}

        <div class="card col-12 card-show">

          <div class="row">

          <img id="img-show" class="card-img-top p-0 col-6" src="{{Str::startsWith($house->img, 'http') ? $house->img : Storage::url($house->img)}}" alt="{{$house->title}}" alt="{{$house->title}}">
          
          <div class="card-body col-6 pt-0">
            <h5 class="card-title">{{$house->title}}</h5>
            <p class="card-text text-light">{{ $house->description }}</p>

            <ul class="list-group list-group-horizontal">
              @forelse ($house->services as $service)
                
                <li class="service-show list-group-item py-0 mt-2">
                  @if ($service->name == 'Wi-Fi')
                    <i class="fas fa-wifi"></i>
                  @elseif ($service->name == 'Posto Macchina')
                    <i class="fas fa-parking"></i>
                  @elseif ($service->name == 'Piscina')
                    <i class="fas fa-swimming-pool"></i>
                  @elseif ($service->name == 'Portineria')
                    <i class="fas fa-door-open"></i>
                  @elseif ($service->name == 'Sauna')
                    <i class="fas fa-hot-tub"></i>
                  @elseif ($service->name == 'Vista mare')
                    <i class="fas fa-umbrella-beach"></i>
                  @endif
                  {{ $service->name }}</li>
              @empty
                <p class="mt-2 text-light">Nessun Servizio offerto</p>
              @endforelse
            </ul>

          </div>

         </div>

        </div>
    
    </div>  

    {{-- row-mappe-domande --}}

    <div class="row">

      <div class="col-6 p-0 maps">

        {{-- Div contenente la mappa --}}
        <div id="map" style="width: 100%; height: 100%"></div>
      
      </div>  

      <div class="col-6 messages">

        {{-- Form messaggi se non sei loggato o non sei l'utente proprietario--}}

        @if (!Auth::check() || Auth::user()->id != $house->user_id)
          <form action="{{route('messages.store')}}" method="POST">
            @csrf
            @method('POST')
            <h5>Invia una domanda al proprietario</h5>
              <div class="form-group">
                <input type="hidden" class="form-control" id="house_id"  value="{{$house->id}}" name="house_id">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="sender_mail" placeholder="Inserisci il tuo indirizzo mail" value="{{Auth::check() ? Auth::user()->email : ''}}" name="sender_mail">
              </div>
                <div class="form-group">
                  <label for="object">Oggetto</label>
                  <input type="text" class="form-control" id="object" placeholder="Inserisci il titolo dell'oggetto" name="object">
                </div>
    
                <div class="form-group">
                  <label for="body">Domanda</label>
                  <textarea class="form-control" id="body" rows="6" name="body"></textarea>
                </div>
                <button type="submit" class="btn float-right mt-3 btnwhite">Invia la tua domanda</button>
          </form>

        @endif
        {{-- Button sponsor se l'utente autenticato è proprietario della casa --}}

        @auth
          @if (Auth::user()->id == $house->user_id)

          <img id="stonks" src="{{ asset('/images/Stonks.jpg') }}" alt="">
          <a href="{{route('sponsor.create', $house->id)}}" class="btn btnwhite col-6 float-right">Sponsorizza la tua casa</a>

          @endif
        @endauth

      </div>  

    </div>  
    


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

</div>
@endsection
