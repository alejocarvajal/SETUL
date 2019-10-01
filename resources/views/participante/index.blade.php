@extends('layouts.admin')
@section('contenido')
	<table class="table table-hover">
		<tr>
			<th>Nombre</th>
			<th>Identificacion</th>
			<th>Universidad</th>
		</tr>
		@foreach($participantes as $participante)
			<tr>
				<td>{{$participante->nombres}}</td>
				<td>{{$participante->identificacion}}</td>
				<td>{{$participante->universidad}}</td>
				<td><a href="{{ route('participante.edit', $participante->id) }}" class="btn btn-warning">Editar</a></td>
				<td>
					<form action="{{ route('participante.destroy', $participante->id) }}" method="POST">
						@csrf
						<input type="submit" class="btn btn-danger" value="Eliminar">
						@method('DELETE')
					</form>
				</td>
			</tr>
		@endforeach
	</table>
@endsection