@extends('layouts.admin')
@section('contenido')
    <table class="table table-hover">
        <tr>
            <th>Asignatura</th>
            <th>Descripción</th>
            <th>Opciones</th>
        </tr>
        @foreach($asignaturas as $asignatura)
            <tr>
                <td>{{$asignatura->nombre}}</td>
                <td>{{$asignatura->descripcion}}</td>
                <td><a href="{{ route('asignatura.edit', $asignatura->id) }}" class="btn btn-warning">Editar</a></td>
                <td>
                    <form action="{{ route('asignatura.destroy', $asignatura->id) }}" method="POST">
                        @csrf
                        <input type="submit" class="btn btn-danger" value="Eliminar">
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection