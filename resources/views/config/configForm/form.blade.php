<div class="form-group">

    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Nombre:</label>
        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="parametro" value="{{ (isset($configuracion) ? old('nombre',$configuracion->nombre) : old('nombre'))  }}">
    </div>

    <div class="form-group">
        <label for="email">Valor:</label>
        <input type="text" class="form-control" name="valor" id="valor" value="{{ (isset($configuracion) ? old('valor',$configuracion->valor) : old('valor')) }}">
    </div>

    <button type="submit" class="btn btn-primary">GUARDAR</button>

</div>
