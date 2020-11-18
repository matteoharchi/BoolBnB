@extends('layouts.app')
@section('content')
  <div class="container">
      <input type="search" id="search" class="form-control" autocomplete="off" placeholder="Dove vuoi andare?">
  </div>

  <div class="search-container">

  </div>

<script id="entry-template" type="text/x-handlebars-template">
  <div class="entry">
    <h4>@{{title}}</h4>
    <div class="body">
      @{{description}}
    </div>
  </div>
</script>


<div id="map" style="width: 500px; height: 500px; margin: auto"></div>

@endsection