<div class="container">
    <div class="container-logo d-flex justify-content-between align-items-center">
        {{-- primo container --}}
        <div class="logo">
            <div>
            <a href="{{route('home')}}"><h1>BoolBnB</h1></a> 
            </div>
        </div>

        {{-- secondo container --}}
        <div>
            <nav class="navbar navbar-expand-lg">
              <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="#">Alloggi</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Esperienze</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Esperienze online</a>
                  </li>
                </ul>
              </div>
            </nav>
        </div>
        <ul class="navbar-nav flex-row">
          <!-- Authentication Links -->
          @guest
              <li class="nav-item mr-3">
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
      </ul>

        {{-- terzo container --}}
        {{-- <div>
            <nav class="navbar navbar-expand-lg">
              <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="#">Diventa un host</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-globe"></i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-user-circle"></i></a>
                  </li>
                </ul>
              </div>
            </nav>
        </div> --}}



    </div>

    <div class="container-search d-flex justify-content-center align-items-center">
        <nav class="navbar">
          <form class="form-inline">
            <input type="search" id="input-map" class="form-control" placeholder="Where are we going?" />

            <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
            <script>
              var placesAutocomplete = places({
                appId: 'pl0HV962CP1I',
                apiKey: '6d8ad5a03272f61b882a985b5180435d',
                container: document.querySelector('#address-input')
              });
            </script>
          </form>
        </nav>
    </div>

</div>
