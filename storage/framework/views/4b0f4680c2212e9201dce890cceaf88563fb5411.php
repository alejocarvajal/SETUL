<div class="form-group">

    <?php echo e(csrf_field()); ?>

    <div class="form-group">
        <label for="name">Pregunta:</label>
        <textarea class="form-control" name="pregunta" id="pregunta"
                  placeholder="Ingrese su pregunta aqui"><?php echo e((isset($pregunta) ? old('pregunta',$pregunta->pregunta) : old('pregunta'))); ?></textarea>
    </div>
    <div class="form-group">
        <label for="name">Docente:</label>
        <input type="text" class="form-control" name="docente" id="docente" placeholder="Ingrese el nombre del docente"
               value="<?php echo e((isset($pregunta) ? old('docente',$pregunta->docente) : old('docente'))); ?>">
    </div>

    <div class="form-group">
        <label for="asignatura_id">Asignatura:</label>
        <select name="asignatura_id" id="asignatura_id" class="form-control">
            <option value="">Seleccione asignatura</option>
            <?php $__currentLoopData = $asignaturas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asignatura): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($asignatura->id); ?>" <?php echo e(isset($pregunta) ? (old('asignatura_id', $pregunta->asignatura_id) == $asignatura->id ? 'selected' : '') : (old('asignatura_id') == $asignatura->id ? 'selected' : '' )); ?>><?php echo e($asignatura->nombre); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>


    <div class="form-group">
        <label for="name">Respuesta correcta:</label>
        <input type="text" class="form-control" name="respuesta_correcta" id="respuesta_correcta"
               placeholder="Ingrese su respuesta correcta"
               value="<?php echo e((isset($respuestas[0]) ? old('respuesta_correcta',$respuestas[0]->respuesta) : old('respuesta_correcta'))); ?>">
    </div>
    <div class="form-group">
        <label for="respuesta_1">Respuesta incorrecta:</label>
        <input type="text" class="form-control" name="respuesta_1" id="respuesta_1"
               placeholder="Ingrese su respuesta incorrecta"
               value="<?php echo e((isset($respuestas[1]) ? old('respuesta_1',$respuestas[1]->respuesta) : old('respuesta_1'))); ?>">
    </div>
    <div class="form-group">
        <label for="respuesta_2">Respuesta incorrecta:</label>
        <input type="text" class="form-control" name="respuesta_2" id="respuesta_2"
               placeholder="Ingrese su respuesta incorrecta"
               value="<?php echo e((isset($respuestas[2]) ? old('respuesta_2',$respuestas[2]->respuesta) : old('respuesta_2'))); ?>">
    </div>
    <div class="form-group">
        <label for="respuesta_3">Respuesta incorrecta:</label>
        <input type="text" class="form-control" name="respuesta_3" id="respuesta_3"
               placeholder="Ingrese su respuesta incorrecta"
               value="<?php echo e((isset($respuestas[3]) ? old('respuesta_3',$respuestas[3]->respuesta) : old('respuesta_3'))); ?>">
    </div>

    <div class="form-group">
        <label for="dificultad">Dificultad:</label>
        <select name="dificultad" id="dificultad" class="form-control">
            <option value="1" <?php echo e(isset($pregunta) ? (old('dificultad', $pregunta->dificultad) == 1 ? 'selected' : '') : (old('dificultad') == 1 ? 'selected' : '' )); ?> >Baja</option>
            <option value="2" <?php echo e(isset($pregunta) ? (old('dificultad', $pregunta->dificultad) == 2 ? 'selected' : '') : (old('dificultad') == 2 ? 'selected' : '' )); ?>>Media</option>
            <option value="3" <?php echo e(isset($pregunta) ? (old('dificultad', $pregunta->dificultad) == 3 ? 'selected' : '') : (old('dificultad') == 3 ? 'selected' : '' )); ?>>Alta</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">GUARDAR</button>
</div>
<?php /**PATH F:\SETUL\resources\views/pregunta/preguntaForm/form.blade.php ENDPATH**/ ?>