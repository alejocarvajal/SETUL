<?php $__env->startSection('contenido'); ?>
	<table class="table table-hover">
		<tr><th>Nombre</th></tr>
		<?php $__currentLoopData = $preguntas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pregunta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($pregunta->pregunta); ?></td>
				<td><a href="<?php echo e(route('pregunta.edit', $pregunta->id)); ?>" class="btn btn-warning">Editar</a></td>
				<td>
					<form action="<?php echo e(route('pregunta.destroy', $pregunta->id)); ?>" method="POST">
						<?php echo csrf_field(); ?>
						<input type="submit" class="btn btn-danger" value="Eliminar">
						<?php echo method_field('DELETE'); ?>
					</form>
				</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\SETUL\resources\views/pregunta/index.blade.php ENDPATH**/ ?>