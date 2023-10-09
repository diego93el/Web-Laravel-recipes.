@extends('layouts.app')
@section('content')
<div class="container">

                <div class="contenedor">
                    <div class="caja-form">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h2>{{ __('Login') }}</h2>
                        <div class="caja-input">
                            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <label for="email" >{{ __('Direccion Email') }}</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                         
                            </div>
                            <div class="caja-input">
                            

                                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <label for="password" >{{ __('Password') }}</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="recuerdame">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Recuerdame') }}
                                    </label>
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('He olvidado la contraseña') }}
                                    </a>
                                @endif
                            </div>
                                
                                <div class="alert alert-secondary" role="alert">
                                    <p class="text-center">{{__('Aun no estoy registrado.')}} <a href="{{route('register')}}" class="alert-link">{{__('Registrame,')}}</a> {{__('quiero encontrar y compartir las mejores recetas.')}}</p>
                                  </div>    
                            
                                
                                
                                <button type="submit" class="boton">
                                    {{ __('Login') }}
                                </button>
                                
 
                    </form>
                </div>
          </div>
</div>
    
@endsection