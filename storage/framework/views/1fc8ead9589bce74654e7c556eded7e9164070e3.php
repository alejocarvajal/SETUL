<?php $__env->startSection('contenido'); ?>
    <table class="table table-hover">
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Fecha</th>
            <th>No. Preguntas</th>
            <th>Opciones</th>
        </tr>
        <?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($test->nombre); ?></td>
                <td><?php echo e($test->descripcion); ?></td>
                <td><?php echo e($test->fecha); ?></td>
                <td><?php echo e($test->preguntas_total); ?></td>
                <td><a href="<?php echo e(route('test.edit', $test->id)); ?>" class="btn btn-warning">Editar</a></td>
                <td>
                    <form action="<?php echo e(route('test.destroy', $test->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="submit" class="btn btn-danger" value="Eliminar">
                        <?php echo method_field('DELETE'); ?>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SETUL\resources\views/test/index.blade.php ENDPATH**/ ?>