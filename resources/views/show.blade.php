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
        <form>
          <div class="form-group">
            <label for="email">Il tuo indirizzo mail</label>
            <input type="email" class="form-control" id="email" placeholder="porco@dio.com">
          </div>
          <div class="form-group">
            <label for="object">Oggetto</label>
            <input type="text" class="form-control" id="object" placeholder="Inserisci il tuo cazzo di titolo">
          </div>

          <div class="form-group">
            <label for="body">Domanda</label>
            <textarea class="form-control" id="body" rows="6"></textarea>
          </div>
          <button type="submit" class="btn btn-primary float-right mt-3">Invia la tua domanda del cazzo</button>

        </form>
      </div>
    </div>

</div>
@endsection
