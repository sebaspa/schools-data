@extends('adminlte::page')
@section('title', 'Editar filiación')

@section('content_header')
    <a href="{{ route('schools.show', $school) }}" class="btn btn-sm btn-danger float-right">
        <i class="fas fa-eye mr-1"></i>
        Ver filiación
    </a>
    <h1>Editar filiación</h1>
@stop
@if (session('info'))
    <div class="alert alert-success my-3">
        <p class="mb-0">{{ session('info') }}</p>
    </div>
@endif
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Filiación</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('schools.update', ['school' => $school]) }}" method="POST">
                @method('patch')
                <div class="container-fluid">
                    @include('school._form', ['btnText' => 'Editar'])
                </div>
            </form>
        </div>
    </div>
    @can('description.assign')
        <div class="card">
            <div class="card-header">
                <h4>Descripciones</h4>
            </div>
            <div class="card-body">
                <a href="{{ route('buildings.index_by_school', $school) }}" class="btn btn-info">
                    <i class="fa fa-building mr-2"></i> Editar
                </a>
            </div>
        </div>
    @endcan
    @can('plan.assign')
        <div class="card">
            <div class="card-header">
                <h3>Planimetría</h3>
            </div>
            <div class="card-body">
                <a href="{{ route('plans.index', $school) }}" class="btn btn-info">
                    <i class="fa fa-drafting-compass mr-2"></i> Editar
                </a>
            </div>
        </div>
    @endcan
    @can('energy.assign')
        <div class="card">
            <div class="card-header">
                <h4>Tipos de Energía</h4>
            </div>
            <div class="card-body">
                <a href="{{ route('electrics.index', $school) }}" class="btn btn-info">
                    <i class="fa fa-bolt mr-2"></i> Eléctrica
                </a>
                <a href="{{ route('airconditionings.index', $school) }}" class="btn btn-info">
                    <i class="fa fa-fan mr-2"></i> Climatización
                </a>
                <a href="{{ route('heatings.index', $school) }}" class="btn btn-info">
                    <i class="fa fa-fire mr-2"></i> Calefacción
                </a>
                <a href="{{ route('solars.index', $school) }}" class="btn btn-info">
                    <i class="fa fa-sun mr-2"></i> Energía Solar
                </a>
            </div>
        </div>
    @endcan
@stop
