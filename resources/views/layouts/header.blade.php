<nav class="navbar navbar-expand-md navbar-light shadow-sm">
    <div class="container px-3">
      <a class="navbar-brand" href="/">
        <img src="{{ asset('img/logo.png') }}" height="30" alt="Ir al Inicio"> 
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">
          @auth

          <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('account.index')}}">Cuentas</a>
          </li>

          @endauth
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Acceder') }}</a>
          </li>
          {{-- @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
            </li>
          @endif --}}
          @else

          <li class="nav-item dropdown d-flex align-items-center">
            <a id="navbarDropdown" class="nav-link dropdown-toggle-dots" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->email }}
              <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdown">
              <a class="btn btn-danger" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Cerrar Sesión') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </div>
          </li>
          @endguest
        </ul>

      </div>
    </div>
</nav>
