<?php $__env->startSection('contenido'); ?>
    <table class="table table-hover">
        <tr>
            <th>Asignatura</th>
            <th>Descripción</th>
            <th>Opciones</th>
        </tr>
        <?php $__currentLoopData = $asignaturas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asignatura): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($asignatura->nombre); ?></td>
                <td><?php echo e($asignatura->descripcion); ?></td>
                <td><a href="<?php echo e(route('asignatura.edit', $asignatura->id)); ?>" class="btn btn-warning">Editar</a></td>
                <td>
                    <form action="<?php echo e(route('asignatura.destroy', $asignatura->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="submit" class="btn btn-danger" value="Eliminar">
                        <?php echo method_field('DELETE'); ?>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SETUL\resources\views/asignatura/index.blade.php ENDPATH**/ ?>