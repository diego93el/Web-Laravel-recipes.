@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{url('/receta/'.$receta->id)}}" method="post" enctype="multipart/form-data">
<!--Clave para que me deje modificar laravel en la base de datos, especificamos el metodo que estamos usando en este caso es PATCH (ver en la route:list)-->    
@csrf
{{method_field('PATCH')}}
@include('receta.form',['modo'=>'Editar','creador'=>$receta->creado])

</form> 
</div>
@endsection