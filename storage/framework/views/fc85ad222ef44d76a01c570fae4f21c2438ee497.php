<?php $__env->startSection('contenido'); ?>
    <table class="table table-hover">
        <tr>
            <th>Nombre</th>
            <th>Valor</th>
            <th>Opciones</th>
        </tr>
        <?php $__currentLoopData = $configuraciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $configuracion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($configuracion->nombre); ?></td>
                <td><?php echo e($configuracion->valor); ?></td>
                <td><a href="<?php echo e(route('config.edit', $configuracion->id)); ?>" class="btn btn-warning">Editar</a></td>
                <td>
                    <form action="<?php echo e(route('config.destroy', $configuracion->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="submit" class="btn btn-danger" value="Eliminar">
                        <?php echo method_field('DELETE'); ?>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\SETUL\resources\views/config/index.blade.php ENDPATH**/ ?>