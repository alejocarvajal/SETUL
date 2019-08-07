@extends('layouts.admin')
@section('title', "Editar usuario")
@section('contenido')
    <div class="card">
        <h4 class="card-header">Editar usuario</h4>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <h6>Por favor corrige los errores debajo:</h6>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ url("admin/users/{$user->id}") }}">
                {{ method_field('PUT') }}
                @include('users.userForm.form')
            </form>
        </div>
    </div>
@endsection