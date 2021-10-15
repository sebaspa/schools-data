@extends('adminlte::page')
@section('title', 'Climatización')

@section('content_header')
    <a href="{{ route('airconditionings.edit', $airconditioning) }}" class="btn btn-sm btn-danger float-right">
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
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Climatización - Centralizado</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Potencia</h5>
                    <p class="lead">{{ $airconditioning->potency }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Frigoria</h5>
                    <p class="lead">{{ $airconditioning->frigoria }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Marca</h5>
                    <p class="lead">{{ $airconditioning->mark }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Modelo</h5>
                    <p class="lead">{{ $airconditioning->model }}</p>
                </div>
                <div class="col-12">
                    <h5 class="text-bold"><i class="fas fa-comments mr-1 text-red"></i> Otros</h5>
                    <p class="lead">{{ $airconditioning->others ? $airconditioning->others : 'No hay comentarios.' }}</p>
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
                    <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Número de grupos</h5>
                    <p class="lead">{{ $airconditioning->number_groups }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Tipos</h5>
                    <p class="lead">{{ $airconditioning->types }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Marca</h5>
                    <p class="lead">{{ $airconditioning->mark }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Modelo</h5>
                    <p class="lead">{{ $airconditioning->model }}</p>
                </div>
                <div class="col-12">
                    <h5 class="text-bold"><i class="fas fa-comments mr-1 text-red"></i> Otros</h5>
                    <p class="lead">{{ $airconditioning->others ? $airconditioning->others : 'No hay comentarios.' }}</p>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    @endif
@stop
