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
            
                <h1 class="logo">Admin Page</h1>
               
                <a class="navA" href="{{url('receta/')}}">Recetas</a>
                <a class="navA" href="{{ route('dificultades.index')}}">{{__('Dificultades')}}</a>
                <a class="navA" href="{{ route('users.index')}}">{{__('Usuarios')}}</a>
            
             
               <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">-->
                    <!-- Left Side Of Navbar -->
                   
                    <!-- Right Side Of Navbar -->
                    
                        <!-- Authentication Links -->
                        

                        
                                    <a class="btnLogin-popup" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    

                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            
                        
                     
                   
        </nav>
    </header>
        

        <main>
            @if(Session::has ('mensaje'))
<div class="alert alert-success alert-dismissible fade show d-flex justify-content-between" role="alert">
    <!--Condicional para la sesion para buscar si tiene un mensaje, y si existe el mensaje lo devuelve, el mensaje se crea en la funcion creat -->
   
    {{Session::get('mensaje')}}
    
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"><ion-icon name="close"></ion-icon></span>
    </button>
</div>
@endif
            @yield('content')
        </main>
    
    <footer>
    @extends ('includes.footer')
</footer>
</body>
</html>