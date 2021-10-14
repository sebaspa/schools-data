@extends('adminlte::page')
@section('title', 'Energía eléctrica')

@section('content_header')
    <a href="{{ route('electrics.edit', $electric) }}" class="btn btn-sm btn-warning float-right">
        <i class="fas fa-edit mr-1 text-yellow"></i>
        Editar energía eléctrica
    </a>
    <h1>Información de la energía eléctrica</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success my-3">
            <p class="mb-0">{{ session('info') }}</p>
        </div>
    @endif
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Energía eléctrica</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-file-alt mr-1 text-yellow"></i> Tipo de contrato</strong>
                    <p class="text-muted">{{ $electric->contract_type }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-charging-station mr-1 text-yellow"></i> Número de suministro</strong>
                    <p class="text-muted">{{ $electric->supply_number }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-lightbulb mr-1 text-yellow"></i> Número de contador</strong>
                    <p class="text-muted">{{ $electric->number_light_meter }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-bolt mr-1 text-yellow"></i> Potencia contratada</strong>
                    <p class="text-muted">{{ $electric->hired_potency }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-bolt mr-1 text-yellow"></i> Potencia total</strong>
                    <p class="text-muted">{{ $electric->total_potency }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-plug mr-1 text-yellow"></i> Acometida general</strong>
                    <p class="text-muted">{{ $electric->general_rush }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-battery-three-quarters mr-1 text-yellow"></i> Número de circuitos</strong>
                    <p class="text-muted">{{ $electric->number_circuits }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-solar-panel mr-1 text-yellow"></i> Número de cuadros parcial</strong>
                    <p class="text-muted">{{ $electric->partial_squares }}</p>
                </div>
                <div class="col-12">
                    <strong><i class="fas fa-comments mr-1 text-yellow"></i> Otros</strong>
                    <p class="text-muted">{{ $electric->others ? $electric->others : 'No hay comentarios.' }}</p>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@stop
