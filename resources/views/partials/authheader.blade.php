<div class="container pl-4 pr-4">

    {{-- row-logo --}}
    <div class="row align-items-center" >

        {{-- logo --}}

        <div class="logo col-7">
            <div class="row align-items-center">
                <a href="{{route('home')}}"><h1><i class="fab fa-bootstrap"></i> boolbnb</h1></a>
            </div>
        </div>

        {{-- Authentication Links --}}

        <ul class="navbar-nav col-5">
            <div class="row align-items-center justify-content-end">
                @guest
              <li class="nav-item mr-2">
                  <a class="nav-link btn btn-authheader" href="{{ route('login') }}">{{ __('Accedi') }}</a>
              </li>
              @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link btn btn-authheader" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                  </li>
              @endif
          @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle btn-authheader" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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

</div>
