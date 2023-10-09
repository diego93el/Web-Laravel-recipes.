@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{url('/receta')}}" method="post" enctype="multipart/form-data">
@csrf
<!--El modo sirve para cambiar palabras de una pagina a otra-->
@include('receta.form',['modo'=>'Crear','creador'=>Auth::user()->name])


</form>
</div>
@endsection