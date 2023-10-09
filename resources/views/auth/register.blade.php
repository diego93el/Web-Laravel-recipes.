@extends('layouts.app')

@section('content')
<div class="container">
    <div class="contenedor">
        <div class="caja-form">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <h2>{{ __('Registro') }}</h2>

                        <div class="caja-input">
                            

                            
                                <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <label for="name" >{{ __('Nombre') }}</label>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div> 

                        <div class="caja-input">
                                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <label for="email" >{{ __('Correo electronico') }}</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                        </div>
                        <div class="caja-input">
                                <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <label for="password" >{{ __('Contraseña') }}</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        

                        </div>
                        <div class="caja-input">
                            
                            <input id="password-confirm" type="password"  name="password_confirmation" required autocomplete="new-password">
                            <label for="password-confirm" >{{ __('Confirma la contaseña') }}</label>
                        </div>
                       
                                <button type="submit" class="boton">
                                    {{ __('Registrase') }}
                                </button>
                            
</div>
@endsection