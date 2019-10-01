<div class="form-group">

    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Nombre:</label>
        <input type="text" class="form-control" name="nombres" id="nombre" placeholder="Ingrese el nombre del participante"
               value="{{ (isset($participante) ? old('nombres',$participante->nombres) : old('nombres'))  }}">
    </div>
    <div class="form-group">
        <label for="name">Identificacion:</label>
        <input type="text" class="form-control" name="identificacion" id="identificacion" placeholder="Ingrese la identificacion del participante"
               value="{{ (isset($participante) ? old('identificacion',$participante->identificacion) : old('identificacion'))  }}">
    </div>
    <div class="form-group">
        <label for="name">Universidad:</label>
        <input type="text" class="form-control" name="universidad" id="universidad" placeholder="Ingrese la universidad del participante"
               value="{{ (isset($participante) ? old('universidad',$participante->universidad) : old('universidad'))  }}">
    </div>
    <div class="form-group">
        <label for="name">Opcion 1:</label>
        <input type="text" class="form-control" name="opc1" id="opc1" placeholder="Ingrese la opcion 1 del participante"
               value="{{ (isset($participante) ? old('opc1',$participante->opc1) : old('opc1'))  }}">
    </div>
    <div class="form-group">
        <label for="name">Opcion 2:</label>
        <input type="text" class="form-control" name="opc2" id="opc2" placeholder="Ingrese la opcion 2 del participante"
               value="{{ (isset($participante) ? old('opc2',$participante->opc2) : old('opc2'))  }}">
    </div>

    <div class="form-group">
        <label for="test_id">Test:</label>
        <select name="test_id" id="test_id" class="form-control">
            <option value="">Seleccione Test</option>
            @foreach($tests as $test)
                <option value="{{$test->id}}" {{ isset($participante) ? (old('test_id', $participante->test_id) == $test->id ? 'selected' : '') : (old('test_id') == $test->id ? 'selected' : '' ) }}>{{$test->nombre}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">GUARDAR</button>
</div>
