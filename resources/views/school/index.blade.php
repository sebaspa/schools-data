@extends('adminlte::page')

@section('title', 'Escuelas')

@section('content_header')
    <a href="{{ route('schools.create') }}" class="btn btn-sm btn-secondary float-right"><i class="fas fa-user-plus mr-1"></i>
        Crear escuela
    </a>
    <h1>Listado de escuelas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="table-schools">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop