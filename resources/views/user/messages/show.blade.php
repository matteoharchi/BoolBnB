@extends('layouts.authlayout')
@section('content')
<div class="container pt-4">
    <h2>{{$message->object}}</h2>
    <p>{{$message->body}}</p>
    <div class="d-flex pb-4 justify-content-end">
        <a href="{{route('houses.index')}}" class="btn btn-white">Torna alla Dashboard</a>
    </div>

</div>
@endsection