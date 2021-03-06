<!DOCTYPE html>
<html lang="ptb">
<head>
    <meta charset="utf-8">

    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">


    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('script-header')
    <title>{{ config('app.name') }}</title>

    <!-- Styles -->

  {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">  --}}
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark " >
            <div class="container-fluid">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                   {{--  <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#app-navbar-collapse"
                        aria-controls="app-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation"><span class="dark-blue-text">
                        <i class="fas fa-bars fa-1x"></i></span></button> --}}

                    <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#app-navbar-collapse"
                            aria-controls="app-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @if (Auth::check())

                            <li class="nav-item"><a class="nav-link" href="{{ route('tr.index') }}">Entrada TR</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('compras.index') }}">Compras</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Minutas</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Licitaçoes</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Contratos</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Tabelas
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('superintendencia.index') }}">Superintendencias</a>
                                  <a class="dropdown-item" href="{{ route('setor.index') }}">Setores</a>
                                  <div class="dropdown-divider"></div>
                                  <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="nav-item dropdown"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                         @else
                            <li class="nav-item dropdown"><a class="nav-link" href="{{ route('register') }}">Registrar</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span></a>

                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item"href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout</a>

                                    </div>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->

<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
@yield('script-footer')



</body>
</html>
