@extends('layouts.app')
@section('content')
<div class="container text-light">

    <h2>Sponsorizza il tuo appartamento</h2>
    {{-- andrà messo il collegamento al titolo della casa --}}
    <p>Scegli la modalità di sponsorizzazione:</p>
    
    <div class="form-check">
        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
        <label class="form-check-label" for="exampleRadios1">
            Normal: €2,99 per 24 ore di sponsorizzazione.
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
        <label class="form-check-label" for="exampleRadios2">
            Premium: €5,99 per 72 ore di sponsorizzazione.
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
        <label class="form-check-label" for="exampleRadios2">
            VIP: €9,99 per 144 ore di sponsorizzazione.
        </label>
    </div>
    <a href="" class="btn btn-success">Conferma</a>
    
</div>
    @endsection