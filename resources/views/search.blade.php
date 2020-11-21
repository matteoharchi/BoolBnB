@extends('layouts.app')
@section('content')
  
   <div class="container">
      <input type="search" id="search" class="form-control" autocomplete="off" placeholder="Dove vuoi andare?">
      <div class="d-flex align-items-center">
        @foreach ($services as $service)
            <label class="mr-2  mb-0" for="{{$service->name}}">{{$service->name}}</label>
            <input type="checkbox" class="mr-4" id="{{$service->name}}" value="{{$service->id}}">
        @endforeach
      </div>
      <div class="search-container"></div>

      <div id="map" style="width: 500px; height: 500px; margin: auto"></div>
      

  </div>



<script id="entry-template" type="text/x-handlebars-template">
  <div class="entry">
    <h4>@{{title}}</h4>
    <div class="body">
      @{{description}}
    </div>
  </div>
</script>




@endsection
