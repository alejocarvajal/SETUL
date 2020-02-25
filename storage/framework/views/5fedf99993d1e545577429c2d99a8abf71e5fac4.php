<?php $__env->startSection('contenido'); ?>
	<table class="table table-hover">
		<tr>
			<th>Nombre</th>
			<th>Identificacion</th>
			<th>Universidad</th>
		</tr>
		<?php $__currentLoopData = $participantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $participante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($participante->nombres); ?></td>
				<td><?php echo e($participante->identificacion); ?></td>
				<td><?php echo e($participante->universidad); ?></td>
				<td><a href="<?php echo e(route('participante.edit', $participante->id)); ?>" class="btn btn-warning">Editar</a></td>
				<td>
					<form action="<?php echo e(route('participante.destroy', $participante->id)); ?>" method="POST">
						<?php echo csrf_field(); ?>
						<input type="submit" class="btn btn-danger" value="Eliminar">
						<?php echo method_field('DELETE'); ?>
					</form>
				</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SETUL\resources\views/participante/index.blade.php ENDPATH**/ ?>