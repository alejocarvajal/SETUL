<div class="form-group">
      {{ csrf_field() }}
      <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Pedro Perez" value="{{ (isset($user) ? old('nombre',$user->nombre) : old('nombre'))  }}">
      </div>

      <div class="form-group">
            <label for="email">Correo electrónico:</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="pedro@example.com" value="{{ (isset($user) ? old('email',$user->email) : old('email')) }}">
      </div>

      <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" class="form-control" name="clave" id="clave" placeholder="Mayor a 6 caracteres">
      </div>

      <button type="submit" class="btn btn-primary">GUARDAR</button>

</div>