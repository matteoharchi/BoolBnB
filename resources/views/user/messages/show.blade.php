@extends('layouts.authlayout')
@section('content')
<div class="container pt-4">
    <h2>{{$message->object}}</h2>
    <small>Inviato da: {{$message->sender_mail}}</small>
    <br>
    <small>Il: {{$message->created_at}}</small>
    <p class="mt-4">{{$message->body}}</p>
    <div class="d-flex pb-4 justify-content-end">
        <a href="{{route('houses.index')}}" class="btn btn-white">Torna alla Dashboard</a>
    </div>

</div>
@endsection