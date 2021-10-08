@extends('adminlte::page')
@section('title', 'Energía solar')

@section('content_header')
    <a href="{{ route('solars.edit', $solar) }}" class="btn btn-sm btn-warning float-right">
        <i class="fas fa-edit mr-1 text-yellow"></i>
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
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Energía solar</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-chart-area mr-1 text-yellow"></i> Superficie total</strong>
                    <p class="text-muted">{{ $solar->total_area }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-solar-panel mr-1 text-yellow"></i> Número de paneles</strong>
                    <p class="text-muted">{{ $solar->number_panels }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-bolt mr-1 text-yellow"></i> Potencia instalada</strong>
                    <p class="text-muted">{{ $solar->installed_potency }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-bullseye mr-1 text-yellow"></i> Marca</strong>
                    <p class="text-muted">{{ $solar->mark }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-bullseye mr-1 text-yellow"></i> Modelo</strong>
                    <p class="text-muted">{{ $solar->model }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-bolt mr-1 text-yellow"></i> Energía suministradaa la red</strong>
                    <p class="text-muted">{{ $solar->energy_supplied }}</p>
                </div>
                <div class="col-12">
                    <strong><i class="fas fa-comments mr-1 text-yellow"></i> Otros</strong>
                    <p class="text-muted">{{ $solar->others ? $solar->others : 'No hay comentarios.' }}</p>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@stop
