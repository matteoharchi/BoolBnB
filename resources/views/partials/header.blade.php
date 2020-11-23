<div class="container">

    {{-- row-logo --}}

    <div class="row align-items-center" >

        {{-- logo --}}

        <div class="logo col-6">
            <div class="row align-items-center justify-content-start">
                <a href="{{route('home')}}"><h1><i class="fab fa-bootstrap"></i> boolbnb</h1></a>
            </div>
        </div>

        {{-- Authentication Links --}}

        <ul class="navbar-nav col-6">
            <div class="row align-items-center justify-content-end">
                @guest
              <li class="nav-item mr-5">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
              @endif
          @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }}
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                      <a class="dropdown-item" href="{{route('houses.index')}}">Il tuo Account</a>
                      <a class="dropdown-item" href="{{route('houses.create')}}">Crea un nuovo annuncio</a>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </div>
              </li>
          @endguest
            </div>
        </ul>

    </div>

    {{-- row-search --}}

    <div class="row align-items-center justify-content-center">

        <form class="form-inline col-8 align-items-center">

            <input type="search" id="input-map" class="form-control col-10" placeholder="Dove vuoi andare?"/>

            <button class="btnblue col-2"><i class="fas fa-search"></i></button>

            <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
            <script>
              var placesAutocomplete = places({
                appId: 'pl0HV962CP1I',
                apiKey: '6d8ad5a03272f61b882a985b5180435d',
                container: document.querySelector('#address-input')
              });
            </script>
           
        </form>


</div>
