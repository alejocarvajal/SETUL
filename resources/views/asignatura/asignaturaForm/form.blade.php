<div class="form-group">

    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Nombre:</label>
        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Derecho" value="{{ (isset($asignatura) ? old('nombre',$asignatura->nombre) : old('nombre'))  }}">
    </div>

    <div class="form-group">
        <label for="email">Descripcion:</label>
        <textarea class="form-control" name="descripcion" id="descripcion">{{ (isset($asignatura) ? old('descripcion',$asignatura->descripcion) : old('descripcion')) }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">GUARDAR</button>

</div>
