@extends('adminlte::page')
@section('title', 'Editar escuela')

@section('content_header')
    <a href="{{ route('schools.show', $school) }}" class="btn btn-sm btn-secondary float-right">
        <i class="fas fa-eye mr-1"></i>
        Ver escuela
    </a>
    <h1>Editar escuela</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Filiación</h4>
        </div>
        <div class="card-body">
            @if (session('info'))
                <div class="alert alert-success my-3">
                    <p class="mb-0">{{ session('info') }}</p>
                </div>
            @endif
            <form action="{{ route('schools.update', ['school' => $school]) }}" method="POST">
                @method('patch')
                <div class="container-fluid">
                    @include('school._form', ['btnText' => 'Editar'])
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4>Construcciones</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('schools.updatebuildings', $school) }}" method="POST">
                @method('patch')
                <div class="container-fluid">
                    @include('school._form_building_school', ['btnText' => 'Editar'])
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>Planos</h3>
        </div>
        <div class="card-body">
            <a href="{{ route('plans.index', $school) }}" class="btn btn-primary">
                <i class="fa fa-drafting-compass mr-2"></i> Planos
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4>Tipos de Energía</h4>
        </div>
        <div class="card-body">
            <a href="{{ route('electrics.index', $school) }}" class="btn btn-primary">
                <i class="fa fa-bolt mr-2"></i> Eléctrica
            </a>
            <a href="{{ route('solars.index', $school) }}" class="btn btn-primary">
                <i class="fa fa-sun mr-2"></i> Solar
            </a>
            <a href="{{ route('airconditionings.index', $school) }}" class="btn btn-primary">
                <i class="fa fa-fan mr-2"></i> Climatización
            </a>
        </div>
    </div>
@stop
