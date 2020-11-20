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
    
    {{-- Form edit house --}}
    <form action="{{route('houses.update', $house->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="title">Titolo</label>
        <input  type="text" class="form-control" id="title" name="title" placeholder="Titolo annuncio" value="{{$house->title}}">
        </div>
        <div class="form-group">
            <label for="address">Indirizzo</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Indirizzo" value="{{$house->address}}">
        </div>
        <div class="sub d-flex width-100">
            <div class="form-group col-2 pl-0">
                <label for="rooms">Numero Stanze</label>
                <input type="number" min="1" class="form-control" id="rooms" name="rooms" value="{{$house->rooms}}">
            </div>
            <div class="form-group col-2">
                <label for="beds">Numero Posti Letto</label>
                <input type="number" min="1" class="form-control" id="beds" name="beds" value="{{$house->beds}}">
            </div>
            <div class="form-group col-2">
                <label for="bathrooms">Numero Bagni</label>
                <input type="number" min="1" class="form-control" id="bathrooms" name="bathrooms" value="{{$house->bathrooms}}">
                </div>
            <div class="form-group col-2">
                <label for="size">Dimensioni (m²)</label>
                <input type="number" min="1" class="form-control" id="size" name="size" placeholder="m²" value="{{$house->size}}">
            </div>
            <div class="form-group col-2">
                <label for="price">Prezzo</label>
                <input type="number" min="1" class="form-control" id="price" name="price" placeholder="Euro" value="{{$house->price}}">
            </div>
        </div>
        <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="3" >{{$house->description}}</textarea>
        </div>

        {{-- Inserimento servizi --}}
        <p>Servizi:</p>
         <div class="form-group d-flex align-items-center">    
        @foreach ($services as $service)          
            <label class="mr-2  mb-0" for="{{$service->name}}">{{$service->name}}</label>
            <input type="checkbox" class="mr-4" name="services[]" value="{{$service->id}}" {{($house->services->contains($service->id) ? 'checked' : '')}}>
        @endforeach
        </div>

        {{-- Inserimento immagini --}}
        <img src="{{Storage::url($house->img)}}" alt="{{$house->slug}}" width="300px">
        <div class="form-group">
            <label for="img">Cambia le foto della tua casa</label>
            <input type="file" accept="image/*" class="form-control" id="img" name="img">
        </div>

        {{-- Modifica casa --}}
        <button type="submit" class="btn btn-primary float-right">Modifica annuncio</button>
    </form>

    {{-- Cancella casa --}}
    <form action="{{route('houses.destroy', $house->id)}}" method="post">
    @csrf
    @method('DELETE')
        <button type="submit" class="btn btn-danger">Cancella</button>
    </form>
    
</div>    
@endsection