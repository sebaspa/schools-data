@extends('adminlte::page')
@section('title', 'Energía solar')

@section('content_header')
    <a href="{{ route('solars.edit', $solar) }}" class="btn btn-sm btn-danger float-right">
        <i class="fas fa-edit mr-1 text-white"></i>
        Editar energía solar
    </a>
    <h1>Información de la energía solar</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success my-3">
            <p class="mb-0">{{ session('info') }}</p>
        </div>
    @endif
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Energía solar</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-chart-area mr-1 text-red"></i> Superficie total</h5>
                    <p class="lead">{{ $solar->total_area }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-solar-panel mr-1 text-red"></i> Número de paneles</h5>
                    <p class="lead">{{ $solar->number_panels }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-bolt mr-1 text-red"></i> Potencia instalada</h5>
                    <p class="lead">{{ $solar->installed_potency }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-bullseye mr-1 text-red"></i> Marca</h5>
                    <p class="lead">{{ $solar->mark }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-bullseye mr-1 text-red"></i> Modelo</h5>
                    <p class="lead">{{ $solar->model }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-bolt mr-1 text-red"></i> Energía suministradaa la red</h5>
                    <p class="lead">{{ $solar->energy_supplied }}</p>
                </div>
                <div class="col-12">
                    <h5 class="text-bold"><i class="fas fa-comments mr-1 text-red"></i> Otros</h5>
                    <p class="lead">{{ $solar->others ? $solar->others : 'No hay comentarios.' }}</p>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@stop
