<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ingrediente Ideal') }}</title>

    <!-- Fonts-->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> 
    @extends('includes.head')
    
     
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <header>
        <nav class="navegador">
         <div class="cont">
            <img class="ima"src="{{url ('assets/Logo.png')}}" alt="logo"/>
                <h1 class="logo">Ingrediente Ideal</h1>
                <a class="navA" href="{{url('/')}}">Pagina Principal</a>
                <a class="navA" href="{{url('receta/show')}}">Buscador</a>
                <a class="navA" href="{{url('receta/')}}">Recetas</a>
                <a class="navA" href="{{url('about/')}}">Acerca de Ingrediente Ideal</a>
                <a class="navA" href="{{url('about/contact')}}">Contacto</a>
                
             
               <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">-->
                    <!-- Left Side Of Navbar -->
                   
                    <!-- Right Side Of Navbar -->
                    
                        <!-- Authentication Links -->
                        @guest
                        <div class="btn-group" role="group" aria-label="LoginRegistermix">
                            @if (Route::has('login'))
                               
                                    <a class="btn btnLogin-popup"  href="{{ route('login') }}">{{ __('Login') }}</a>
                              
                            @endif

                            @if (Route::has('register'))
                                
                                   <a class="btn btnLogin-popup"  href="{{ route('register') }}">{{ __('Registro') }}</a>
                        </div>
                            @endif
                            @else
                                    <a class="btn btnLogin-popup" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <h4>Cocinero: {{ Auth::user()->name }}
                                    </h4>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            
                        @endguest
                     
                   
        </nav>
    </header>
        

        <main>
            @yield('content')
        </main>
    
    <footer>
    @extends ('includes.footer')
</footer>
</body>
</html>