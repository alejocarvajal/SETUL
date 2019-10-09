@extends('layouts.admin')
@section('contenido')
    <table class="table table-hover">
        <tr>
            <th>Nombre</th>
            <th>Valor</th>
            <th>Opciones</th>
        </tr>
        @foreach($configuraciones as $configuracion)
            <tr>
                <td>{{$configuracion->nombre}}</td>
                <td>{{$configuracion->valor}}</td>
                <td><a href="{{ route('config.edit', $configuracion->id) }}" class="btn btn-warning">Editar</a></td>
                <td>
                    <form action="{{ route('config.destroy', $configuracion->id) }}" method="POST">
                        @csrf
                        <input type="submit" class="btn btn-danger" value="Eliminar">
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection