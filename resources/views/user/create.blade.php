@extends('layouts.authlayout')
@section('content')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
          <p>{{$error}}</p>
        @endforeach
    </div>
    @endif
    
    <form action="{{route('houses.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="title">Titolo</label>
            <input  type="text" class="form-control" id="title" name="title" placeholder="Titolo annuncio">
        </div>
        <div class="form-group">
            <label for="address">Indirizzo</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Indirizzo">

            <input type="hidden" id="lat" name="lat" value="">
            <input type="hidden" id="long" name="long" value="">
        </div>
        <div class="sub d-flex width-100">
            <div class="form-group col-2 pl-0">
                <label for="rooms">Numero Stanze</label>
                <input type="number" min="1" class="form-control" id="rooms" name="rooms" value="rooms">
            </div>
            <div class="form-group col-2">
                <label for="beds">Numero Posti Letto</label>
                <input type="number" min="1" class="form-control" id="beds" name="beds" value="beds">
            </div>
            <div class="form-group col-2">
                <label for="bathrooms">Numero Bagni</label>
                <input type="number" min="1" class="form-control" id="bathrooms" name="bathrooms" value="bathrooms">
            </div>
            <div class="form-group col-2">
                <label for="size">Dimensioni (m²)</label>
                <input type="number" min="1"class="form-control" id="size" name="size" placeholder="m²">
            </div>
            <div class="form-group col-2">
                <label for="price">Prezzo</label>
                <input type="number" min="1" class="form-control" id="price" name="price" placeholder="Euro">
            </div>
        </div>
        <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <label>Servizi</label>
        <div class="form-group d-flex align-items-center">
        @foreach ($services as $service)
            <label class="mr-2  mb-0" for="{{$service->name}}">{{$service->name}}</label>
            <input type="checkbox" class="mr-4" id="{{$service->name}}" name='services[]' value="{{$service->id}}">
        @endforeach
        </div>
        <div class="form-group">
            <label for="img">Metti le foto della tua casa</label>
            <input type="file" accept="image/*" class="form-control" id="img" name="img">
        </div>
        {{-- INSERIMENTO IMMAGINI --}}
        <button type="submit" id="create-house" class="btn btn-primary float-right">Crea annuncio</button>
    </form>
</div>    
    @endsection