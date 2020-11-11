@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{route('houses.store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="title">Titolo</label>
            <input  type="text" class="form-control" id="title" name="title" placeholder="Titolo annuncio">
        </div>
        <div class="form-group">
            <label for="address">Indirizzo</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Indirizzo">
        </div>
        <div class="sub d-flex width-100">
            <div class="form-group col-2 pl-0">
                <label for="rooms">Numero Stanze</label>
                <select class="form-control" id="rooms" name="rooms">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                </select>
            </div>
            <div class="form-group col-2">
                <label for="beds">Numero Posti Letto</label>
                <select class="form-control" id="beds" name="beds" >
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                </select>
            </div>
            <div class="form-group col-2">
                <label for="bathrooms">Numero Bagni</label>
                <select class="form-control" id="bathrooms" name="bathrooms">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                </select>
            </div>
            <div class="form-group col-2">
                <label for="size">Dimensioni (m²)</label>
                <input type="number" class="form-control" id="size" name="size" placeholder="m²"></input>
                

            </div>
            <div class="form-group col-2">
                <label for="price">Prezzo</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Euro">
            </div>
        </div>
        <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        {{-- INSERIMENTO IMMAGINI --}}
        <button type="submit" class="btn btn-primary float-right">Crea annuncio</button>
    </form>
</div>    
    @endsection