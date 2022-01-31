<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <script src="{{ mix('js/app.js') }}" defer></script>
  <script src="https://kit.fontawesome.com/55a6169dfd.js" defer crossorigin="anonymous"></script>
  <title>Admin - @yield('title')</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home') }}">Restoran & Pizzeria Šimun</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @auth


        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{route('home')}}">Početna</a>
          </li>
          @if(Auth::user()->role == 'Admin')
          <li class="nav-item">
            <a class="nav-link @if(Route::is('staff.index')) active @endif" href="{{route('staff.index') }}">Osoblje</a>
          </li>
          @endif
          @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Manager')
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle  @if(Route::is('day-off.index')) active @endif @if(Route::is('work-time.index')) active @endif @if(Route::is('dates-off.index')) active @endif" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Radno vrijeme
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              @if(Auth::user()->role == 'Admin')
              <li><a class="dropdown-item" href="{{ route('work-time.index') }}">Upravljaj vremenom</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              @endif
              <li><a class="dropdown-item" href="{{ route('day-off.index') }}">Neradni dani</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="{{ route('date-off.index') }}">Neradni datumi</a></li>
            </ul>
          </li>
          @endif

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Rezervacije
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Printaj za dan</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Sve rezervacije</a></li>
              @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Manager')
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Otkaži rezervaciju</a></li>
              @endif
            </ul>
          </li>
          @if(Auth::user()->role == 'Admin')

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Galerija
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Pokaži galeriju</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Dodaj sliku</a></li>
            </ul>
          </li>
          @endif
          @if(Auth::user()->role == 'Admin')
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle @if(Route::is('show-menu')) active @endif @if(Route::is('food.index')) active @endif @if(Route::is('section.index')) active @endif @if(Route::is('category.index')) active @endif" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Menu
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="{{ route('section.index') }}">Odjeljci</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="{{ route('category.index') }}">Kategorije</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="{{ route('food.index') }}">Stavke</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle @if(Route::is('food.create')) active @endif @if(Route::is('section.create')) active @endif @if(Route::is('category.create')) active @endif" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Stvori novo
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="{{ route('section.create') }}">Stvori odjeljak</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="{{ route('category.create') }}">Stvori kategoriju</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="{{ route('food.create') }}">Stvori stavku</a></li>
            </ul>
          </li>
          @endif
        </ul>
        <ul class="navbar-nav ms-auto">
          <!-- Authentication Links -->
          @guest
          @if (Route::has('login'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @endif


          @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
        @endauth

      </div>
    </div>
  </nav>
  <div class="py-4">
    @yield('content')
  </div>