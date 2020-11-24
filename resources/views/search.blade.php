@extends('layouts.authlayout')
@section('content')

{{-- @dd($services, $query) --}}
  <div class="container col-12">
	  <div>
      @if (!empty($query))
        <input type="search" id="search" autocomplete="off" value="{{$query['query']}}">
      @else
        <input type="search" id="search" autocomplete="off" value="" placeholder="Dove vuoi andare?">
      @endif
		  <button id="search-btn"><i class="fas fa-search"></i></button>
	  </div>
      <div class="sub d-flex width-100">
        <div class="form-group col-2 pl-0">
            <label for="rooms">Numero Stanze</label>
            <input type="number" min="1" class="form-control" id="rooms" value="1">
        </div>
        <div class="form-group col-2">
            <label for="beds">Numero Posti Letto</label>
            <input type="number" min="1" class="form-control" id="beds" value="1">
        </div>        
        <div class="form-group col-2">
            <label for="beds">Raggio (km)</label>
            <input type="number" min="1" class="form-control" id="radius" value="20">
        </div>        
      </div>

      <div class="d-flex align-items-center">
        @foreach ($services as $service)
            <label class="mr-2  mb-0" for="{{$service->name}}">{{$service->name}}</label>
            <input type="checkbox" class="mr-4" id="service-{{$service->id}}" value="{{$service->name}}">
        @endforeach
      </div>
        {{-- contenitore ricerche annunci sponsorizzati --}}
        <div class="search-premium-container" style="color:red"></div>
        {{-- contenitore annunci per poveri --}}
        <div class="search-container text-light"></div>
        <div id="map" style="width: 500px; height: 500px; margin: auto"></div>
    </div>


{{-- Handlebars --}}
<script id="entry-template" type="text/x-handlebars-template">
  <div class="entry">
    <h4>@{{title}}</h4>
    <div class="body">
	  @{{description}}
	  <div class="services">
		@{{#each services}}
			<label class="mr-2  mb-0" for="@{{this}}">@{{this}}</label>
		@{{/each}}
	  </div>
    </div>
  </div>
</script>




@endsection
