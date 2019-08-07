<div class="form-group">

    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Nombre:</label>
        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Derecho"
               value="{{ (isset($test) ? old('nombre',$test->nombre) : old('nombre'))  }}">
    </div>

    <div class="form-group">
        <label for="email">Descripcion:</label>
        <textarea class="form-control" name="descripcion"
                  id="descripcion">{{ (isset($test) ? old('descripcion',$test->descripcion) : old('descripcion')) }}</textarea>
    </div>

    <div class="form-group">
        <label for="name">número de preguntas totales:</label>
        <input type="text" class="form-control" name="preguntas_total" id="preguntas_total"
               placeholder="Preguntas totales"
               value="{{ (isset($test) ? old('preguntas_total',$test->preguntas_total) : old('preguntas_total'))  }}">
    </div>

    <div class="form-group">
        <label for="name">Númoero de preguntas bajas:</label>
        <input type="text" class="form-control" name="preguntas_baja" id="preguntas_baja"
               placeholder="Preguntas prioridad baja"
               value="{{ (isset($test) ? old('preguntas_baja',$test->preguntas_baja) : old('preguntas_baja'))  }}">
    </div>

    <div class="form-group">
        <label for="name">Númoero de preguntas medias:</label>
        <input type="text" class="form-control" name="preguntas_media" id="preguntas_media"
               placeholder="Preguntas prioridad media"
               value="{{ (isset($test) ? old('preguntas_media',$test->preguntas_media) : old('preguntas_media'))  }}">
    </div>

    <div class="form-group">
        <label for="name">Númoero de preguntas altas:</label>
        <input type="text" class="form-control" name="preguntas_alta" id="preguntas_alta"
               placeholder="Preguntas prioridad alta"
               value="{{ (isset($test) ? old('preguntas_alta',$test->preguntas_alta) : old('preguntas_alta'))  }}">
    </div>

    <div class="form-group">
        <label for="name">Asignaturas:</label></br>
        @foreach($asignaturas as $asignatura)
            <div class="form-check form-check-inline">
                <input name="asignaturas[{{ $asignatura->id }}]"
                       class="form-check-input"
                       type="checkbox"
                       id="skill_{{ $asignatura->id }}"
                       value="{{ $asignatura->id }}"
                        {{ old("asignatura_s.{$asignatura->id}") ? 'checked' : '' }}>
                <label class="form-check-label" for="asignatura_{{ $asignatura->id }}">{{ $asignatura->nombre }}</label>
            </div>
        @endforeach

    </div>
    <button type="submit" class="btn btn-primary">GUARDAR</button>

</div>