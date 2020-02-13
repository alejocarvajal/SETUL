<?php $__env->startSection('contenido'); ?>

	<h1 class="text-center text-uppercase">Estos son los usuarios registrados</h1>

	<table class="table table-hover">
		<th>nombre</th>
		<th>Email</th>
		<th>Opciones</th>
		<?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($usuario->nombre); ?></td>
				<td><?php echo e($usuario->email); ?></td>
				<td>
					<a href="<?php echo e(route('users.edit', $usuario->id)); ?>" class="btn btn-warning">Editar</a>
				</td>
				<td>
					<form action="<?php echo e(route('users.destroy', $usuario->id)); ?>" method="POST">
						<?php echo csrf_field(); ?>
						<input type="submit" class="btn btn-danger" value="Eliminar">
						<?php echo method_field('DELETE'); ?>
					</form>
				</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SETUL\resources\views/admin/index.blade.php ENDPATH**/ ?>