@extends('layouts.authlayout')
@section('content')

  <div class="container text-light col-12">
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

        <div class="row">
        
          <div class="house-ctr-search col-6">
            {{-- contenitore ricerche annunci sponsorizzati --}}
            <div class="search-premium-container" style="color:red"></div>
            {{-- contenitore annunci per poveri --}}
            <div class="search-container text-light"></div>
          </div>
          {{-- mappa --}}
          <div class="map-ctr-search col-6">
            <div id="map" style="width: 500px; height: 500px; margin: auto"></div>
          </div>

        </div>

        
  </div>
{{-- 
    <div class="container bcontent">
      <h2>Bootstrap Horizontal Card</h2>
      <hr />
      <div class="card" style="width: 500px;">
          <div class="row no-gutters">
              <div class="col-sm-5">
                  <img class="card-img" src="/images/defaultimg.png" alt="Suresh Dasari Card">
              </div>
              <div class="col-sm-7">
                  <div class="card-body">
                      <h5 class="card-title">Suresh Dasari</h5>
                      <p class="card-text">Suresh Dasari is a founder and technical lead developer in tutlane.</p>
                      <a href="#" class="btn btn-primary">View Profile</a>
                  </div>
              </div>
          </div>
      </div>
  </div> --}}


{{-- Handlebars --}}
<script id="entry-template" type="text/x-handlebars-template">
  <div class="col-sm-5">
    {{-- <img id="img-show" src="{{Str::startsWith($house->img, 'http') ? $house->img : Storage::url($house->img)}}" alt="{{$house->title}}" alt="{{$house->title}}"> --}}

    <img class="card-img" src="@{{img}}" alt="">
  </div>
  <div class="entry">
    <h4>@{{title}}</h4>
    <div class="body">
      @{{description}}
	  <div class="services">
      @{{#each services}}
			<label class="mr-2 mb-0" for="@{{this}}">@{{this}}</label>
      @{{/each}}
	  </div>
    </div>
  </div>
</script>




@endsection
