@extends('layouts.app')

@section('content')
<div class="container">
    <div class="tabla">
        <div class="tbody">
            <div class="row">
            <h3>Contacto</h3>
            <div class="col" id="campoNombre">
                <label for="nombre">Nombre:</label>
                <input required type="text" name="nombre"/>
            
            
                <label for="telefono">Telefono:</label>
                <input required type="text" name="telefono"/>
            
                <label for="email">E-mail:</label>
                <input required type="text" name="email"/>
            
         
                <label for="direccion">Direccion:</label>
                <input required type="text" name="direccion"/>
            
               <label for="informacion">Que clase de informacion desea solicitar:</label>
               <select required name="informacion">
                   <option value="consulta">Consulta</option>
                   <option value="consulta">Sugerencia</option>
                   <option value="consulta">Reclamo</option>
               </select> 
      
                <h5>Porfavor seleccione su sexo:</h5>
                <input type="radio" name="sexo" id="masculino" value="1"/>
                <label for="masculino">Masculino</label>
                <input type="radio" name="sexo" id="femenino" value="0"/>
                <label for="femenino">Femenino</label>
                <input type="radio" name="sexo" id="indefinido" value="0"/>
                <label for="indefinido">Indefinido</label>

           
                <label for="comentarios">Comentarios:</label>
                <textarea name="comentarios" cols="30" rows="15"></textarea>
            
                <label for="datos">¿Desea que guardemos sus datos?:</label>
                <input required type="checkbox" name="datos">
            
                <a><input type="submit" value="Enviar"></a>
            
        </div>
        </div>
        <div class="tbody">
            <div class="row">
                <div class="col">
            <h3>Visitanos</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3038.1895085277183!2d-3.6797945715056057!3d40.40465239513606!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd42261a6aeee885%3A0x9b11a2bd368ca16f!2sTu%20Tienda%20Merceria!5e0!3m2!1ses!2ses!4v1690323644974!5m2!1ses!2ses" width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <strong><h4>Horarios</h4></strong>
            <p>Lunes a viernes</p><br>
            <p>21:00-14:00</p><br>
            <p>17:00-21:00</p><br>
            <strong>Escribenos por Contacto para pedidos online, nos comunicaremos contigo</strong>
        </div>
        </div>
        </div>
    </div>

</div>
@endsection