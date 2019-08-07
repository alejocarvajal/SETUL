@extends('layouts.admin')
@section('title', "Editar test")

@section('contenido')
    <div class="card">
        <h4 class="card-header">Editar Test</h4>
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

            <form method="POST" action="{{ url("admin/tests/{$test->id}") }}">
                {{ method_field('PUT') }}
                @include('test.testForm.form')
            </form>
        </div>
    </div>
@endsection