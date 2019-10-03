@extends('layouts.admin')
@section('title', "Importar Preguntas")
@section('contenido')
    <div class="card-body">
        <form action="{{ url('admin/preguntas/import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" class="form-control">
            <br>
            <button class="btn btn-success">Importar Preguntas</button>
            <!--a class="btn btn-warning" href="{{ url('admin/preguntas/export') }}">Export User Data</a-->
        </form>
    </div>
@endsection