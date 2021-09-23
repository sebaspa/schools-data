@extends('adminlte::page')
@section('title', 'Plano')

@section('content_header')
    <a href="{{ route('plans.edit', $plan) }}" class="btn btn-sm btn-secondary float-right">
        <i class="fas fa-edit mr-1"></i>
        Editar plano
    </a>
    <h1>Información de el plano</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success my-3">
            <p class="mb-0">{{ session('info') }}</p>
        </div>
    @endif
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Plano</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6">
                    <strong><i class="fas fa-school mr-1"></i> Nombre</strong>
                    <p class="text-muted">{{ $plan->title }}</p>
                </div>
                <div class="col-12 col-md-6">
                    <strong><i class="fas fa-school mr-1"></i> Descripción</strong>
                    <p class="text-muted">{{ $plan->description ? $plan->description : 'No hay descripción.' }}</p>
                </div>
                <div class="col-12 col-md-6">
                    <strong><i class="fas fa-school mr-1"></i> Plano</strong>
                    <div class="mt-3">
                        <a href="/storage/{{ $plan->document }}" class="btn btn-success" target="_blank">
                            <i class="fa fa-eye mr-2"></i>Ver plano
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@stop
