@extends('adminlte::page')
@section('title', 'Escuela')

@section('content_header')
    <a href="{{ route('schools.edit', $school) }}" class="btn btn-sm btn-secondary float-right">
        <i class="fas fa-edit mr-1"></i>
        Editar escuela
    </a>
    <h1>Información de la escuela</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success my-3">
            <p class="mb-0">{{ session('info') }}</p>
        </div>
    @endif
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Principal</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-school mr-1"></i> Nombre</strong>
                    <p class="text-muted">{{ $school->name }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Dirección</strong>
                    <p class="text-muted">{{ $school->address }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-map-marked-alt mr-1"></i> Distrito</strong>
                    <p class="text-muted">{{ $school->district }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-phone mr-1"></i> Teléfono</strong>
                    <p class="text-muted">{{ $school->phone }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-fax mr-1"></i> Fax</strong>
                    <p class="text-muted">{{ $school->fax }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="far fa-envelope mr-1"></i> Email</strong>
                    <p class="text-muted">{{ $school->email }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-user-shield mr-1"></i> Responsable</strong>
                    <p class="text-muted">{{ $school->liable }}</p>
                </div>
                <div class="col-12">
                    <strong><i class="fas fa-question mr-1"></i> Otros</strong>
                    <p class="text-muted">{{ $school->others != '' ? $school->others : 'No hay información.' }}</p>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

    @if (!$school->buildings->isEmpty())
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Construcciones</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($school->buildings as $building)
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $building->pivot->quantity }}</h3>

                                    <p>{{ $building->name }}</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-building"></i>
                                </div>
                                <a href="{{ route('schools.show_building_images', [$school, $building]) }}"
                                    class="small-box-footer">Ver fotos <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Planimetría</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-2">
                    <a href="{{ route('plans.index', $school) }}" class="btn btn-primary">
                        <i class="fa fa-drafting-compass mr-2"></i> Ver Planos
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tipos de energía</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-2">
                    <a href="{{ route('electrics.index', $school) }}" class="btn btn-block btn-primary">
                        <i class="fa fa-bolt mr-2"></i> Eléctrica
                    </a>
                </div>
                <div class="col-12 col-md-2">
                    <a href="{{ route('solars.index', $school) }}" class="btn btn-block btn-primary">
                        <i class="fa fa-sun mr-2"></i> Solar
                    </a>
                </div>
                <div class="col-12 col-md-2">
                    <a href="{{ route('airconditionings.index', $school) }}" class="btn btn-block btn-primary">
                        <i class="fa fa-fan mr-2"></i> Climatización
                    </a>
                </div>
                <div class="col-12 col-md-2">
                    <a href="{{ route('heatings.index', $school) }}" class="btn btn-block btn-primary">
                        <i class="fa fa-fire mr-2"></i> Calefacción
                    </a>
                </div>
            </div>
        </div>
    </div>

@stop
