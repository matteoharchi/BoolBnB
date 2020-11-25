@extends('layouts.authlayout')
@section('content')

<div class="container create">

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

        {{-- Titolo e indirizzo --}}
        <div class="row">
            <div class="form-group pt-2 col-9">
                <label for="title">Titolo</label>
            <input  type="text" class="form-control" id="title" name="title" placeholder="Titolo annuncio" value="{{$house->title}}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-9">
                <label for="address">Indirizzo</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Indirizzo" value="{{$house->address}}">
            </div>
        </div>

        {{-- Stanze, letti, bagni, mq e prezzo --}}
        <div class="row">
                <div class="form-group col-md-2 col-sm-2 col-4 mr-1">
                    <label for="rooms">Stanze</label>
                    <input type="number" min="1" class="form-control" id="rooms" name="rooms" value="{{$house->rooms}}">
                </div>
                <div class="form-group col-md-2 col-sm-3 col-4 mr-1">
                    <label for="beds">Posti Letto</label>
                    <input type="number" min="1" class="form-control" id="beds" name="beds" value="{{$house->beds}}">
                </div>
                <div class="form-group col-md-2 col-sm-2 col-4 mr-1">
                    <label for="bathrooms">Bagni</label>
                    <input type="number" min="1" class="form-control" id="bathrooms" name="bathrooms" value="{{$house->bathrooms}}">
                    </div>
                <div class="form-group col-md-2 col-sm-2 col-4 mr-1">
                    <label for="size">Dimensioni</label>
                    <input type="number" min="1" class="form-control" id="size" name="size" placeholder="m²" value="{{$house->size}}">
                </div>
                <div class="form-group col-md-2 col-sm-3 col-4 mr-1">
                    <label for="price">Prezzo</label>
                    <input type="number" min="1" class="form-control" id="price" name="price" placeholder="Euro" value="{{$house->price}}">
                </div>
        </div>

        {{-- Descrizione --}}
        <div class="row">
            <div class="form-group col-9">
                <label for="description">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="3" >{{$house->description}}</textarea>
            </div>
        </div>

        {{-- Servizi --}}
         <div class="row">
            <div class="form-group col-12 d-flex flex-wrap">    
                @foreach ($services as $service)
                    <div class="pr-2 pl-0">
                        <label class="pr-2" for="{{$service->name}}">{{$service->name}}</label>
                        <input type="checkbox" class="mr-4" name="services[]" value="{{$service->id}}" {{($house->services->contains($service->id) ? 'checked' : '')}}>
                    </div>    
                @endforeach
                </div>
         </div>

        {{-- Inserimento immagini --}}
        <div class="row">
            <div class="col-12">
                <img src="{{ asset('storage/' . $house->img)}}" alt="{{$house->slug}}" width="300px">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12 bg-none pt-3">
                <label for="img">Cambia l'immagine dell'annuncio</label>
                <input type="file" accept="image/*" class="" id="img-edit" name="img">
            </div>
        </div>

        {{-- Modifica casa --}}
        <div class="form-group col-12 bg-none pt-3">
            <label for="visible">Visibile</label>
            <input type="hidden" name="visible" value="0">
            <input type="checkbox" name="visible" id="visible" value="1" {{($house->visible==1 ? 'checked' : '')}}>
        </div>
        <button id="edit-house" type="submit" class="btn btn-white">Modifica annuncio</button>       

    </form>

     {{-- Cancella casa --}}

     <form action="{{route('houses.destroy', $house->id)}}" method="post">

        @csrf
        @method('DELETE')
            <button type="submit" class="btn btn-red mb-3">Cancella annuncio</button>
    
    </form> 
    
</div>  
@endsection
