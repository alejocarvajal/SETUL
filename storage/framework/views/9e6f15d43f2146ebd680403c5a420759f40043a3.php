<?php $__env->startSection('title', "Editar test"); ?>

<?php $__env->startSection('contenido'); ?>
    <div class="card">
        <h4 class="card-header">Editar Test</h4>
        <div class="card-body">

            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <h6>Por favor corrige los errores debajo:</h6>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(url("admin/tests/{$test->id}")); ?>">
                <?php echo e(method_field('PUT')); ?>

                <?php echo $__env->make('test.testForm.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\SETUL\resources\views/test/edit.blade.php ENDPATH**/ ?>