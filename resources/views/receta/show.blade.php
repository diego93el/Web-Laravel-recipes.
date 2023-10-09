
@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="tabla">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Encuentra tu receta!</strong> Escribe lo que tengas en tu lista de compras, la manera que quieras hacer tu comida o el tiempo que te quieras tomar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <form method="get" class="buscador">
            <div class="input-group mb-3 w-50  mx-auto">
            <input type="text" name="search" value="{{request()->get('search')}}" class="form-control"placeholder="Buscar..." aria-label="Buscar..."aria-describedby="button-addon2">
            <button class="btn btn-warning"type="submit" id="button-addon2">Buscar</button>
         </div>
        </form> 
        <section class="cabezal">
            
            <h2>Buscador de recetas</h2>
            
        </section>
        <section class="tbody">
            <table>
            <thead>
                <tr>
                    
                    <th>Receta</th>
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