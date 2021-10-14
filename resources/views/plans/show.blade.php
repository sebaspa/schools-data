@extends('adminlte::page')
@section('title', 'Planimetría')

@section('content_header')
    <a href="{{ route('plans.edit', $plan) }}" class="btn btn-sm btn-danger float-right">
        <i class="fas fa-edit mr-1"></i>
        Editar planimetría
    </a>
    <h1>Información de la planimetría</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success my-3">
            <p class="mb-0">{{ session('info') }}</p>
        </div>
    @endif
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Planimetría</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-4">
                    <strong><i class="fas fa-school mr-1"></i> Nombre</strong>
                    <p class="text-muted">{{ $plan->title }}</p>
                </div>
                <div class="col-12 col-md-4">
                    <strong><i class="fas fa-school mr-1"></i> Descripción</strong>
                    <p class="text-muted">{{ $plan->description ? $plan->description : 'No hay descripción.' }}</p>
                </div>
                <div class="col-12 col-md-4">
                    <strong><i class="fas fa-school mr-1"></i> Tipo</strong>
                    <p class="text-muted">{{ $plan->service->name }}</p>
                </div>
                <div class="col-12">
                    <strong><i class="fas fa-school mr-1"></i> Planimetría</strong>
                    <div class="mt-3">
                        <a href="/storage/{{ $plan->document }}" class="btn btn-info" target="_blank">
                            <i class="fa fa-eye mr-2"></i>Ver planimetría
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@stop
