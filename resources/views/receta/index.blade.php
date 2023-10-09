@extends('layouts.app')
@extends('includes.head')

@section('content')
<div class="container">

<!--Condicional para la sesion para buscar si tiene un mensaje, y si existe el mensaje lo devuelve, el mensaje se crea en la funcion creat -->
@if(Session::has ('mensaje'))
<div class="alert alert-success alert-dismissible fade show d-flex justify-content-between" role="alert">
    <!--Condicional para la sesion para buscar si tiene un mensaje, y si existe el mensaje lo devuelve, el mensaje se crea en la funcion creat -->
   
    {{Session::get('mensaje')}}
    
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"><ion-icon name="close"></ion-icon></span>
    </button>
</div>
@endif
<div class="tabla">
    

<section class="cabezal">
    <h2>Recetas</h2>
    @auth 
    <a class="btn btn-outline-light" href="{{url('receta/create')}}">Crear una nueva receta</a>
    @endauth
    
</section>
<section class="tbody">
    <table>
    <thead>
        <tr>
            
            <th>Nombre</th>
            <th>Instrucciones</th>
            <th>Ingrediente</th>
            <th>Tiempo</th>
            <th>Dificultad</th>
            <th>Creado por:</th>
            <th>Foto</th>
            
        </tr>
    </thead>
    
    
    
    <tbody>
       <!--Se usa un foreach para mostrar los datos de la tabla de la base de datos--> 
       
       @foreach ($recetas as $receta)
       
        <tr>
            
            <td>{{$receta->nombre}}</td>
            <td>{{$receta->instrucion}}</td>
            <td>{{$receta->ingrediente_id}}</td>
            <td>{{$receta->tiempo}} Minutos</td>
            <td>{{$receta->dificultade->nombre}}</td>
            <td>{{$receta->user->name}}</td>

            <td>
            <!--el src se hace ruta al almacen, generamos la carpeta storage, definimos la variable del archivo que queremos buscar, se debe hacer el comnado en la terminal
            php artisan storage:link-->
            <img src="{{ asset('storage').'/'.$receta->foto }}"  alt="">
            </td>
            <td>
          
          
            
            @auth ('admin')
            <!-- los corchetes dobles son para crear la ruta del enlace, boton, etc... -->
            <a href="{{url('/receta/'.$receta->id.'/edit')}}" class="btn btn-outline-dark">Editar </a>
            @endauth
            @auth 
            <!-- los corchetes dobles son para crear la ruta del enlace, boton, etc... -->
            <a href="{{url('/receta/'.$receta->id.'/edit')}}" class="btn btn-outline-dark">Editar </a>
            @endauth
            
           </td>
            <td>
           @auth('admin')     
             <form action="{{url('/receta/'.$receta->id)}}" class="d-inline"method="post">
                @csrf
                {{method_field('DELETE')}}
                <input type="submit" onclick="return confirm ('Quieres borrar?')" class="btn btn-outline-danger" value="Borrar">
             </form>
             @endauth
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</section>
<div class="pagination justify-content-center">
    {{ $recetas->links()}}
</div>

   
</div>

</div>
@endsection