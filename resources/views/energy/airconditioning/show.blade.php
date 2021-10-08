@extends('adminlte::page')
@section('title', 'Climatización')

@section('content_header')
    <a href="{{ route('airconditionings.edit', $airconditioning) }}" class="btn btn-sm btn-warning float-right">
        <i class="fas fa-edit mr-1"></i>
        Editar climatización
    </a>
    <h1>Información de la climatización</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success my-3">
            <p class="mb-0">{{ session('info') }}</p>
        </div>
    @endif
    @if ($airconditioning->subtypeenergy_id == 1)
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Climatización - Centralizado</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-file-alt mr-1 text-yellow"></i> Potencia</strong>
                    <p class="text-muted">{{ $airconditioning->potency }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-file-alt mr-1 text-yellow"></i> Frigoria</strong>
                    <p class="text-muted">{{ $airconditioning->frigoria }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-file-alt mr-1 text-yellow"></i> Marca</strong>
                    <p class="text-muted">{{ $airconditioning->mark }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-file-alt mr-1 text-yellow"></i> Modelo</strong>
                    <p class="text-muted">{{ $airconditioning->model }}</p>
                </div>
                <div class="col-12">
                    <strong><i class="fas fa-comments mr-1"></i> Otros</strong>
                    <p class="text-muted">{{ $airconditioning->others ? $airconditioning->others : 'No hay comentarios.' }}</p>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    @endif
    @if ($airconditioning->subtypeenergy_id == 2)
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Climatización - Parcial</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-file-alt mr-1 text-yellow"></i> Número de grupos</strong>
                    <p class="text-muted">{{ $airconditioning->number_groups }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-file-alt mr-1 text-yellow"></i> Tipos</strong>
                    <p class="text-muted">{{ $airconditioning->types }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-file-alt mr-1 text-yellow"></i> Marca</strong>
                    <p class="text-muted">{{ $airconditioning->mark }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-file-alt mr-1 text-yellow"></i> Modelo</strong>
                    <p class="text-muted">{{ $airconditioning->model }}</p>
                </div>
                <div class="col-12">
                    <strong><i class="fas fa-comments mr-1"></i> Otros</strong>
                    <p class="text-muted">{{ $airconditioning->others ? $airconditioning->others : 'No hay comentarios.' }}</p>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    @endif
@stop
