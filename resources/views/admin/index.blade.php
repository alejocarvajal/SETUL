@extends('layouts.admin')
@section('contenido')

	<h1 class="text-center text-uppercase">Estos son los usuarios registrados</h1>

	<table class="table table-hover">
		<th>nombre</th>
		<th>Email</th>
		<th>Opciones</th>
		@foreach($usuarios as $usuario)
			<tr>
				<td>{{$usuario->nombre}}</td>
				<td>{{$usuario->email}}</td>
				<td>
					<a href="{{ route('users.edit', $usuario->id) }}" class="btn btn-warning">Editar</a>
				</td>
				<td>
					<form action="{{ route('users.destroy', $usuario->id) }}" method="POST">
						@csrf
						<input type="submit" class="btn btn-danger" value="Eliminar">
						@method('DELETE')
					</form>
				</td>
			</tr>
		@endforeach
	</table>
@endsection