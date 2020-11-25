@extends('layouts.authlayout')
@section('content')

  <div class="container col-12">
	  <div class="search-bar d-flex">
      @if (!empty($query))
        <input type="text" id="search" autocomplete="off" value="{{$query['query']}}">
      @else
        <input type="text" id="search" autocomplete="off" value="" placeholder="Dove vuoi andare?">
      @endif
		  <button id="search-btn"><i class="fas fa-search"></i></button>
	  </div>
      <div class="sub details-bar d-flex width-100">
        <div class="form-group col-4 col-sm-3 col-md-2 pl-0">
            <label for="rooms">Stanze</label>
            <input type="number" min="1" class="form-control" id="rooms" value="1">
        </div>
        <div class="form-group col-4 col-sm-3 col-md-2">
            <label for="beds">Posti Letto</label>
            <input type="number" min="1" class="form-control" id="beds" value="1">
        </div>        
        <div class="form-group col-4 col-sm-3 col-md-2">
            <label for="beds">Raggio (km)</label>
            <input type="number" min="1" class="form-control" id="radius" value="20">
        </div>        
      </div>

      <div class="services-bar align-items-center col-12 col-md-6 pb-2 d-flex flex-wrap">
        @foreach ($services as $service)
          <div class="service-bar-dtl">
            <label class="mr-2 mb-0" for="{{$service->name}}">{{$service->name}}</label>
            <input type="checkbox" class="mr-4" id="service-{{$service->id}}" value="{{$service->name}}">
          </div> 
        @endforeach
      </div>

        <div class="row" style="padding-bottom: 20px;">
        
          <div class="house-ctr-search col-12 col-md-6">
            {{-- contenitore ricerche annunci sponsorizzati --}}
            <div class="search-premium-container" style="color:gold"></div>
            {{-- contenitore annunci per poveri --}}
            <div class="search-container"></div>
          </div>
          {{-- mappa --}}
          <div class="map-ctr-search col-12 col-md-6 text-dark d-flex justify-content-center rounded">
            <div id="map"></div>
            
          </div>

        </div>

        
  </div>

{{-- Handlebars --}}
<script id="entry-template" type="text/x-handlebars-template">

  <div class="entry">
    <div class="house-card-src">
        <div class="row">
          <div class="col-3 col-md-5 search-img">
            <img id="search-img" class="card-img rounded" src="@{{img}}" alt="@{{title}}">
          </div>
          <div class="col-9 col-md-7 house-details">
            <h5>@{{title}}</h5>
            <div class="house-details-rooms">
              <ul class="mb-0">
                <li><small>stanze: @{{rooms}} - </small></li>
                <li><small>letti: @{{beds}} - </small></li>
                <li><small>bagni: @{{bathrooms}}</small></li>
              </ul>
            </div>
            <div class="services">
              @{{#each services}}
              <label class="mr-2 mb-0" for="@{{this}}"><small><i class="far fa-dot-circle"></i> @{{this}}</small></label>
              @{{/each}}
            </div>
            <div class="house-price-src">
              <h5>@{{price}}€ a notte</h5>
            </div>
          </div>
      </div>
    </div>
  </div>
  
</script>




@endsection
