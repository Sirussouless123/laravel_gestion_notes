<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <link rel="stylesheet" href=" {{ asset('assets/css/base.css')}}">
</head>
<body>
    @php 
    $route = request()->route()->getName();
   
     @endphp
    <div id="app">
        <nav class="navbar navbar-expand-lg bg-dark " data-bs-theme="dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'SCHOLAR-ADMIN') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="/">Home</a>
                          </li>
                          <li class="nav-item">
                            <a href="{{ route('admin.filiere.index')}}" @class(['nav-link',
                             'active'=>str_contains($route,'filiere')])>Filières</a>
                          </li>
                          <li class="nav-item">
                            <a  href="{{ route('admin.matiere.index')}}"  @class(['nav-link',
                            'active'=>str_contains($route,'matiere')])>Matières</a>
                          </li>
                         
                          <li class="nav-item">
                            <a  href="{{ route('admin.annee.index')}}"    @class(['nav-link',
                            'active'=>str_contains($route,'annee')])>Année académique</a>
                          </li>
                          <li class="nav-item">
                            <a  href="{{ route('admin.filiere_matiere.index')}}"  class="nav-link">Filières-Matières</a>
                          </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
                </div>
            </div>
        </nav>

        <div class="container py-4">
            @if (session('success'))
                  <div class="alert alert-success">
                    {{ session('success')}}
                  </div>
            @endif
            @yield('content')
          </div>
    </div>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
