@extends('layouts.admin')
@section('contenido')
    <table class="table table-hover">
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Fecha</th>
            <th>No. Preguntas</th>
            <th>Opciones</th>
        </tr>
        @foreach($tests as $test)
            <tr>
                <td>{{$test->nombre}}</td>
                <td>{{$test->descripcion}}</td>
                <td>{{$test->fecha}}</td>
                <td>{{$test->preguntas_total}}</td>
                <td><a href="{{ route('test.edit', $test->id) }}" class="btn btn-warning">Editar</a></td>
                <td>
                    <form action="{{ route('test.destroy', $test->id) }}" method="POST">
                        @csrf
                        <input type="submit" class="btn btn-danger" value="Eliminar">
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection