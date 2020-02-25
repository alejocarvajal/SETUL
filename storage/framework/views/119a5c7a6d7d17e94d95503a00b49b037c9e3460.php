<div class="form-group">

    <?php echo e(csrf_field()); ?>

    <div class="form-group">
        <label for="name">Nombre:</label>
        <input type="text" class="form-control" name="nombres" id="nombre" placeholder="Ingrese el nombre del participante"
               value="<?php echo e((isset($participante) ? old('nombres',$participante->nombres) : old('nombres'))); ?>">
    </div>
    <div class="form-group">
        <label for="name">Identificacion:</label>
        <input type="text" class="form-control" name="identificacion" id="identificacion" placeholder="Ingrese la identificacion del participante"
               value="<?php echo e((isset($participante) ? old('identificacion',$participante->identificacion) : old('identificacion'))); ?>">
    </div>
    <div class="form-group">
        <label for="name">Universidad:</label>
        <input type="text" class="form-control" name="universidad" id="universidad" placeholder="Ingrese la universidad del participante"
               value="<?php echo e((isset($participante) ? old('universidad',$participante->universidad) : old('universidad'))); ?>">
    </div>
    <div class="form-group">
        <label for="name">Opcion 1:</label>
        <input type="text" class="form-control" name="opc1" id="opc1" placeholder="Ingrese la opcion 1 del participante"
               value="<?php echo e((isset($participante) ? old('opc1',$participante->opc1) : old('opc1'))); ?>">
    </div>
    <div class="form-group">
        <label for="name">Opcion 2:</label>
        <input type="text" class="form-control" name="opc2" id="opc2" placeholder="Ingrese la opcion 2 del participante"
               value="<?php echo e((isset($participante) ? old('opc2',$participante->opc2) : old('opc2'))); ?>">
    </div>

    <div class="form-group">
        <label for="test_id">Test:</label>
        <select name="test_id" id="test_id" class="form-control">
            <option value="">Seleccione Test</option>
            <?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($test->id); ?>" <?php echo e(isset($participante) ? (old('test_id', $participante->test_id) == $test->id ? 'selected' : '') : (old('test_id') == $test->id ? 'selected' : '' )); ?>><?php echo e($test->nombre); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">GUARDAR</button>
</div>
<?php /**PATH C:\xampp\htdocs\SETUL\resources\views/participante/participanteForm/form.blade.php ENDPATH**/ ?>