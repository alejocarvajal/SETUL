@extends('layouts.admin')
@section('title', "Crear Pregunta")

@section('contenido')
    <div class="card">
        <h4 class="card-header">Crear Pregunta</h4>
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

            <form method="POST" action="{{ url('admin/preguntas') }}">
                @include('pregunta.preguntaForm.form')
            </form>
        </div>
    </div>
@endsection