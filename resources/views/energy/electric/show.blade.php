@extends('adminlte::page')
@section('title', 'Energía eléctrica')

@section('content_header')
    <a href="{{ route('electrics.edit', $electric) }}" class="btn btn-sm btn-danger float-right">
        <i class="fas fa-edit mr-1 text-white"></i>
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
                    <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-yellow"></i> Tipo de contrato</h5>
                    <p class="lead">{{ $electric->contract_type }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-charging-station mr-1 text-yellow"></i> Número de suministro</h5>
                    <p class="lead">{{ $electric->supply_number }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-lightbulb mr-1 text-yellow"></i> Número de contador</h5>
                    <p class="lead">{{ $electric->number_light_meter }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-bolt mr-1 text-yellow"></i> Potencia contratada</h5>
                    <p class="lead">{{ $electric->hired_potency }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-bolt mr-1 text-yellow"></i> Potencia total</h5>
                    <p class="lead">{{ $electric->total_potency }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-plug mr-1 text-yellow"></i> Acometida general</h5>
                    <p class="lead">{{ $electric->general_rush }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-battery-three-quarters mr-1 text-yellow"></i> Número de circuitos</h5>
                    <p class="lead">{{ $electric->number_circuits }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-solar-panel mr-1 text-yellow"></i> Número de cuadros parcial</h5>
                    <p class="lead">{{ $electric->partial_squares }}</p>
                </div>
                <div class="col-12">
                    <h5 class="text-bold"><i class="fas fa-comments mr-1 text-yellow"></i> Otros</h5>
                    <p class="lead">{{ $electric->others ? $electric->others : 'No hay comentarios.' }}</p>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@stop
