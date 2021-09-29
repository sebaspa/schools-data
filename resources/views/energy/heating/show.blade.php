@extends('adminlte::page')
@section('title', 'Calefacción')

@section('content_header')
    <a href="{{ route('heatings.edit', $heating) }}" class="btn btn-sm btn-secondary float-right">
        <i class="fas fa-edit mr-1"></i>
        Editar Calefacción
    </a>
    <h1>Información de la Calefacción</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success my-3">
            <p class="mb-0">{{ session('info') }}</p>
        </div>
    @endif
    @if ($heating->subtypeenergy_id == 3)
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Calefacción - Eléctrico</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-file-alt mr-1"></i> Número de radiadores</strong>
                    <p class="text-muted">{{ $heating->number_radiators }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-file-alt mr-1"></i> Potencia</strong>
                    <p class="text-muted">{{ $heating->potency }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-file-alt mr-1"></i> Modelo</strong>
                    <p class="text-muted">{{ $heating->model }}</p>
                </div>
                <div class="col-12">
                    <strong><i class="fas fa-comments mr-1"></i> Otros</strong>
                    <p class="text-muted">{{ $heating->others ? $heating->others : 'No hay comentarios.' }}</p>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    @endif
    @if ($heating->subtypeenergy_id == 4)
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Calefacción - Combustible</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-file-alt mr-1"></i> Gas</strong>
                    <p class="text-muted">{{ $heating->gas }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-file-alt mr-1"></i> Gas Oil</strong>
                    <p class="text-muted">{{ $heating->gasoil }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-file-alt mr-1"></i> Tipo de caldera</strong>
                    <p class="text-muted">{{ $heating->type_boiler }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-file-alt mr-1"></i> Número de radiadores</strong>
                    <p class="text-muted">{{ $heating->number_radiators }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-file-alt mr-1"></i> Volumen de depósito</strong>
                    <p class="text-muted">{{ $heating->tank_volume }}</p>
                </div>
                <div class="col-12">
                    <strong><i class="fas fa-comments mr-1"></i> Otros</strong>
                    <p class="text-muted">{{ $heating->others ? $heating->others : 'No hay comentarios.' }}</p>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    @endif
@stop