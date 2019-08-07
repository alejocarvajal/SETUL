@extends('layouts.admin')
@section('contenido')
	<table class="table table-hover">
		<tr><th>Nombre</th></tr>
		@foreach($preguntas as $pregunta)
			<tr>
				<td>{{$pregunta->pregunta}}</td>
				<td><a href="{{ route('pregunta.edit', $pregunta->id) }}" class="btn btn-warning">Editar</a></td>
				<td>
					<form action="{{ route('pregunta.destroy', $pregunta->id) }}" method="POST">
						@csrf
						<input type="submit" class="btn btn-danger" value="Eliminar">
						@method('DELETE')
					</form>
				</td>
			</tr>
		@endforeach
	</table>
@endsection