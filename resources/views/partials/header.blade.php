<div class="container pl-4 pr-4">


    <div class="row align-items-center" >

        {{-- Logo --}}

        <div class="logo col-9">
            <div class="row align-items-center">
                <a href="{{route('home')}}"><h1><i class="fab fa-bootstrap"></i> boolbnb</h1></a>
            </div>
        </div>

        {{-- Link di autenticazione --}}

        <ul class="navbar-nav col-3">
            <div class="row align-items-center justify-content-end">
                @guest
              <li class="nav-item mr-2">
                  <a class="nav-link btn btn-header" href="{{ route('login') }}">{{ __('Accedi') }}</a>
              </li>
              @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link btn btn-header" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                  </li>
              @endif
          @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle btn btn-header" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }}
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                      <a class="dropdown-item" href="{{route('houses.index')}}">Il tuo Account</a>
                      <a class="dropdown-item" href="{{route('houses.create')}}">Crea un nuovo annuncio</a>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Esci') }}
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

    {{-- barra di ricerca home --}}

    <div class="row align-items-center justify-content-center">
        {{-- form e input desktop e tablet --}}
        <form action="{{route('search')}}" class="form-inline align-items-center">
            <div class="search-bar-home">
                <input type="search" id="search-home" name="query" autocomplete="off" placeholder="Dove vuoi andare?">
                <div class="search"></div>
            </div>
        </form>
        {{-- form e input smartphone --}}
        <form action="{{route('search')}}" class="form-inline align-items-center">
            <div class="search-bar-home-smart">
                <input type="search" id="search-home-smart" name="query" autocomplete="off" placeholder="Dove vuoi andare?">
                <button id="search-btn-home" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>


    </div>
</div>