
<div class="contenedor">
    <div class="caja-form">
        <h2>{{$modo}} Receta</h2>
        @if(count($errors)>0)
<!-- Ponemos una lista ul mostrando cada uno de los mensajes de los campos no validados correctamente, usamos el metodo foreach-->
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach( $errors->all() as $error)

       <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
        <!-- el value corresponde al nombre del id a editar en la pagina editar -->
    <div class="caja-input">
    <input type="text" value="{{isset($receta->nombre)?$receta->nombre:''}}" name="nombre" id="nombre">
    <label for="nombre">{{__('Dame el nombre de la receta')}}</label>
    </div>
    <div class="caja-input">
    <input type="text" value="{{isset($receta->instrucion)?$receta->instrucion:''}}" name="instrucion"  id="instrucion" placeholder="Separa cada paso por una coma">
    <label for="instrucion">{{__('Describe como se prepararia')}}</label>
    </div>
    <div class="caja-input">
    <input type="text" value="{{isset($receta->ingrediente_id)?$receta->ingrediente_id:''}}" name="ingrediente_id"id="ingrediente_id" placeholder="Separalos por una coma">
    <label for="ingrediente">{{__('Que ingredientes lleva esta deliciosa receta')}}</label>
    </div>
    <label for="tiempo">{{__('Dame el tiempo que tomas')}}</label>
<div class="caja-input">
<select class="form-control text-dark" value="{{isset($recetas->tiempo)?$recetas->tiempo:''}}" name="tiempo" id="tiempo" >
     <option>{{_('¿Cuantos minutos?')}}</option>
      <option>5</option>
      <option>10</option>
      <option>15</option>
      <option>20</option>
      <option>25</option>
      <option>30</option>
      <option>35</option>
      <option>40</option>
      <option>45</option>
      <option>50</option>
      <option>55</option>
      <option>60</option>
      <option>90</option>
      <option>120</option>
</select>
</div>
<label for="dificultad_id">{{__('¿Que tan dificíl te parece hacerla?')}}</label>
<div class="caja-input">
    <div class="d-grid gap-2">
        {{ Form::label('') }}
        {{ Form::select('dificultad_id', $dificultades ,$receta->dificultad_id, ['class' => 'form-control' . ($errors->has('dificultad_id') ? ' is-invalid' : ''), 'placeholder' => 'Escoge la dificultad']) }}
        {!! $errors->first('dificultad_id', '<div class="invalid-feedback">:message</div>') !!}

    </div>
</div>
    
<label for="usuario">{{ Form::label('Creado por :') }}</label>
<div class="caja-input">
    {{ Form::select('user_id', $usuario,$receta->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'Escoge tu usuario']) }}
    {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}

</div>
    <div class="mb-3">
    @if (isset($receta->foto))
        <img src="{{ asset('storage').'/'.$receta->foto }}" width="100" alt="">
    @endif
    <label class="form-label"  for="foto">{{__('Sube la foto de tu receta')}}</label>
    <input class="form-control" type="file" value="" name="foto" id="foto">
    
    </div>
    <button type="submit" value="{{ $modo }} datos" class="boton">{{($modo)}} Receta</button>
    <div class="d-grid gap-2 col-3 mx-auto">
    <a type="button"class="btn btn-outline-danger" href="{{url('receta  /')}}">Regresar</a>
    </div>
    </div>
    </div>
    </div>