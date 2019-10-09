<?php $__env->startSection('title', "Importar Participantes"); ?>
<?php $__env->startSection('contenido'); ?>
    <div class="card-body">
        <form action="<?php echo e(url('admin/participantes/import')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="file" name="file" class="form-control">
            <br>
            <button class="btn btn-success">Importar Participantes</button>
            <!--a class="btn btn-warning" href="<?php echo e(url('admin/participantes/export')); ?>">Export User Data</a-->
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\SETUL\resources\views/participante/importar.blade.php ENDPATH**/ ?>