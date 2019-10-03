@extends('layouts.admin')
@section('title', "Importar Participantes")
@section('contenido')
    <div class="card-body">
        <form action="{{ url('admin/participantes/import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" class="form-control">
            <br>
            <button class="btn btn-success">Importar Participantes</button>
            <!--a class="btn btn-warning" href="{{ url('admin/participantes/export') }}">Export User Data</a-->
        </form>
    </div>
@endsection