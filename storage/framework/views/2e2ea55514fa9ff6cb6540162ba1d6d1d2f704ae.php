<?php $__env->startSection('title', "Importar Preguntas"); ?>
<?php $__env->startSection('contenido'); ?>
    <div class="card-body">
        <form action="<?php echo e(url('admin/preguntas/import')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="file" name="file" class="form-control">
            <br>
            <button class="btn btn-success">Importar Preguntas</button>
            <!--a class="btn btn-warning" href="<?php echo e(url('admin/preguntas/export')); ?>">Export User Data</a-->
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\SETUL\resources\views/pregunta/importar.blade.php ENDPATH**/ ?>