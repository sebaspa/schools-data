@extends('adminlte::page')
@section('title', 'Calefacción')

@section('content_header')
    <a href="{{ route('heatings.edit', $heating) }}" class="btn btn-sm btn-danger float-right">
        <i class="fas text-white fa-edit mr-1"></i>
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
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Calefacción - Eléctrico</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Número de radiadores</h5>
                    <p class="lead">{{ $heating->number_radiators }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Potencia</h5>
                    <p class="lead">{{ $heating->potency }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Modelo</h5>
                    <p class="lead">{{ $heating->model }}</p>
                </div>
                <div class="col-12">
                    <h5 class="text-bold"><i class="fas fa-comments mr-1 text-red"></i> Otros</h5>
                    <p class="lead">{{ $heating->others ? $heating->others : 'No hay comentarios.' }}</p>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    @endif
    @if ($heating->subtypeenergy_id == 4)
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Calefacción - Combustible</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Gas</h5>
                    <p class="lead">{{ $heating->gas }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Gas Oil</h5>
                    <p class="lead">{{ $heating->gasoil }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Tipo de caldera</h5>
                    <p class="lead">{{ $heating->type_boiler }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Número de radiadores</h5>
                    <p class="lead">{{ $heating->number_radiators }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Volumen de depósito</h5>
                    <p class="lead">{{ $heating->tank_volume }}</p>
                </div>
                <div class="col-12">
                    <h5 class="text-bold"><i class="fas fa-comments mr-1 text-red"></i> Otros</h5>
                    <p class="lead">{{ $heating->others ? $heating->others : 'No hay comentarios.' }}</p>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    @endif
@stop