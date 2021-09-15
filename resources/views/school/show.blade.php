@extends('adminlte::page')
@section('title', 'Escuela')

@section('content_header')
    <h1>Información de la escuela</h1>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Principal</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <strong><i class="fas fa-school mr-1"></i> Nombre</strong>
            <p class="text-muted">{{ $school->name }}</p>
            <hr>

            <strong><i class="fas fa-map-marker-alt mr-1"></i> Dirección</strong>
            <p class="text-muted">{{ $school->address }}</p>
            <hr>

            <strong><i class="fas fa-map-marked-alt mr-1"></i> Distrito</strong>
            <p class="text-muted">{{ $school->district }}</p>
            <hr>

            <strong><i class="fas fa-phone mr-1"></i> Teléfono</strong>
            <p class="text-muted">{{ $school->phone }}</p>
            <hr>

            <strong><i class="fas fa-fax mr-1"></i> Fax</strong>
            <p class="text-muted">{{ $school->fax }}</p>
            <hr>

            <strong><i class="far fa-envelope mr-1"></i> Email</strong>
            <p class="text-muted">{{ $school->email }}</p>
            <hr>

            <strong><i class="fas fa-user-shield mr-1"></i> Responsable</strong>
            <p class="text-muted">{{ $school->liable }}</p>
            <hr>

            <strong><i class="fas fa-question mr-1"></i> Otros</strong>
            <p class="text-muted">{{ $school->others != '' ? $school->others : 'No hay información.' }}</p>
            <hr>

        </div>
        <!-- /.card-body -->
    </div>
    {{ $school->buildings }}

@stop
