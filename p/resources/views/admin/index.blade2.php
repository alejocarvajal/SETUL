@extends('layouts.admin')
@section('contenido')

    <h1 class="text-center text-uppercase">Estos son los usuarios registrados</h1>

    <table class="table table-hover">
        <th>nombre</th>
        <th>Email</th>
        <th>Opciones</th>
        @foreach($usuarios as $usuario)
            <tr>
                <td>{{$usuario->name}}</td>
                <td>{{$usuario->email}}</td>
                <td>
                    <a href="{{ route('admin.edit', $user) }}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
                </td>
                <td>
                    <form action="{{ route('admin.destroy', $usuario->id) }}" method="DELETE">
                        {{ method_field('DELETE') }}
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection