@extends('layouts.authlayout')
@section('content')
<div class="container">
    <h2>{{$message->object}}</h2>
    <p>{{$message->body}}</p>
    <a href="{{route('houses.index')}}" class="btn btn-white float-right">Torna alla Dashboard</a>

</div>
@endsection