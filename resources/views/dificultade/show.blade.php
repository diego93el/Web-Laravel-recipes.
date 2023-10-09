@extends('layouts.app')

@section('template_title')
    {{ $dificultade->name ?? "{{ __('Show') Dificultade" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Dificultade</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('dificultades.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $dificultade->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
