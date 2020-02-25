<div class="form-group">

    <?php echo e(csrf_field()); ?>

    <div class="form-group">
        <label for="name">Nombre:</label>
        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Derecho"
               value="<?php echo e((isset($test) ? old('nombre',$test->nombre) : old('nombre'))); ?>">
    </div>

    <div class="form-group">
        <label for="email">Descripcion:</label>
        <textarea class="form-control" name="descripcion"
                  id="descripcion"><?php echo e((isset($test) ? old('descripcion',$test->descripcion) : old('descripcion'))); ?></textarea>
    </div>

    <div class="form-group">
        <label for="name">número de preguntas totales:</label>
        <input type="text" class="form-control" name="preguntas_total" id="preguntas_total"
               placeholder="Preguntas totales"
               value="<?php echo e((isset($test) ? old('preguntas_total',$test->preguntas_total) : old('preguntas_total'))); ?>">
    </div>

    <div class="form-group">
        <label for="name">Númoero de preguntas bajas:</label>
        <input type="text" class="form-control" name="preguntas_baja" id="preguntas_baja"
               placeholder="Preguntas prioridad baja"
               value="<?php echo e((isset($test) ? old('preguntas_baja',$test->preguntas_baja) : old('preguntas_baja'))); ?>">
    </div>

    <div class="form-group">
        <label for="name">Númoero de preguntas medias:</label>
        <input type="text" class="form-control" name="preguntas_media" id="preguntas_media"
               placeholder="Preguntas prioridad media"
               value="<?php echo e((isset($test) ? old('preguntas_media',$test->preguntas_media) : old('preguntas_media'))); ?>">
    </div>

    <div class="form-group">
        <label for="name">Númoero de preguntas altas:</label>
        <input type="text" class="form-control" name="preguntas_alta" id="preguntas_alta"
               placeholder="Preguntas prioridad alta"
               value="<?php echo e((isset($test) ? old('preguntas_alta',$test->preguntas_alta) : old('preguntas_alta'))); ?>">
    </div>

    <div class="form-group">
        <label for="name">Asignaturas:</label></br>
        <?php $__currentLoopData = $asignaturas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asignatura): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="form-check form-check-inline">
                <input name="asignaturas[<?php echo e($asignatura->id); ?>]"
                       class="form-check-input"
                       type="checkbox"
                       id="skill_<?php echo e($asignatura->id); ?>"
                       value="<?php echo e($asignatura->id); ?>"
                        <?php echo e(old("asignatura_s.{$asignatura->id}") ? 'checked' : ''); ?>>
                <label class="form-check-label" for="asignatura_<?php echo e($asignatura->id); ?>"><?php echo e($asignatura->nombre); ?></label>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
    <button type="submit" class="btn btn-primary">GUARDAR</button>

</div><?php /**PATH C:\xampp\htdocs\SETUL\resources\views/test/testForm/form.blade.php ENDPATH**/ ?>