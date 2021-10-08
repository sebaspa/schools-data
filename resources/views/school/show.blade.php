@extends('adminlte::page')
@section('title', 'Escuela')

@section('content_header')
    <a href="{{ route('schools.edit', $school) }}" class="btn btn-sm btn-warning float-right">
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
    <div class="card card-warning">
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
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Filiaciones</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($school->buildings as $building)
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="small-box bg-warning">
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

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Planimetría</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <p>Planos</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-drafting-compass"></i>
                        </div>
                        <a href="{{ route('plans.index', $school) }}" class="small-box-footer">Ver planos <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Energía eléctrica</h3>
        </div>
        <!-- /.card-header -->
        @forelse ($electrics as $electric)
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <strong><i class="fas fa-file-alt mr-1"></i> Tipo de contrato</strong>
                        <p class="text-muted">{{ $electric->contract_type }}</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <strong><i class="fas fa-charging-station mr-1"></i> Número de suministro</strong>
                        <p class="text-muted">{{ $electric->supply_number }}</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <strong><i class="fas fa-lightbulb mr-1"></i> Número de contador</strong>
                        <p class="text-muted">{{ $electric->number_light_meter }}</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <strong><i class="fas fa-bolt mr-1"></i> Potencia contratada</strong>
                        <p class="text-muted">{{ $electric->hired_potency }}</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <strong><i class="fas fa-bolt mr-1"></i> Potencia total</strong>
                        <p class="text-muted">{{ $electric->total_potency }}</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <strong><i class="fas fa-plug mr-1"></i> Acometida general</strong>
                        <p class="text-muted">{{ $electric->general_rush }}</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <strong><i class="fas fa-battery-three-quarters mr-1"></i> Número de circuitos</strong>
                        <p class="text-muted">{{ $electric->number_circuits }}</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <strong><i class="fas fa-solar-panel mr-1"></i> Número de cuadros parcial</strong>
                        <p class="text-muted">{{ $electric->partial_squares }}</p>
                    </div>
                    <div class="col-12">
                        <strong><i class="fas fa-comments mr-1"></i> Otros</strong>
                        <p class="text-muted">{{ $electric->others ? $electric->others : 'No hay comentarios.' }}
                        </p>
                    </div>
                </div>
            </div>
            <hr />
            <!-- /.card-body -->
        @empty
            <div class="card-body">
                <p>No hay información.</p>
            </div>
        @endforelse
        <div class="card-footer">
            <a href="{{ route('electrics.index', $school) }}" class="btn btn-warning">
                <i class="fa fa-bolt mr-2"></i> Ver más
            </a>
        </div>
    </div>

    <div class="card card-warning">
        <div class="card-header mb-4">
            <h3 class="card-title">Climatización</h3>
        </div>
        <!-- /.card-header -->
        @forelse ($airconditionings as $airconditioning)
            @if ($airconditioning->subtypeenergy_id == 1)
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Centralizado</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4">
                                <strong><i class="fas fa-file-alt mr-1"></i> Potencia</strong>
                                <p class="text-muted">{{ $airconditioning->potency }}</p>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <strong><i class="fas fa-file-alt mr-1"></i> Frigoria</strong>
                                <p class="text-muted">{{ $airconditioning->frigoria }}</p>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <strong><i class="fas fa-file-alt mr-1"></i> Marca</strong>
                                <p class="text-muted">{{ $airconditioning->mark }}</p>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <strong><i class="fas fa-file-alt mr-1"></i> Modelo</strong>
                                <p class="text-muted">{{ $airconditioning->model }}</p>
                            </div>
                            <div class="col-12">
                                <strong><i class="fas fa-comments mr-1"></i> Otros</strong>
                                <p class="text-muted">
                                    {{ $airconditioning->others ? $airconditioning->others : 'No hay comentarios.' }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            @endif
            @if ($airconditioning->subtypeenergy_id == 2)
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Parcial</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4">
                                <strong><i class="fas fa-file-alt mr-1"></i> Número de grupos</strong>
                                <p class="text-muted">{{ $airconditioning->number_groups }}</p>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <strong><i class="fas fa-file-alt mr-1"></i> Tipos</strong>
                                <p class="text-muted">{{ $airconditioning->types }}</p>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <strong><i class="fas fa-file-alt mr-1"></i> Marca</strong>
                                <p class="text-muted">{{ $airconditioning->mark }}</p>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <strong><i class="fas fa-file-alt mr-1"></i> Modelo</strong>
                                <p class="text-muted">{{ $airconditioning->model }}</p>
                            </div>
                            <div class="col-12">
                                <strong><i class="fas fa-comments mr-1"></i> Otros</strong>
                                <p class="text-muted">
                                    {{ $airconditioning->others ? $airconditioning->others : 'No hay comentarios.' }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            @endif
            <hr />
            <!-- /.card-body -->
        @empty
            <div class="card-body">
                <p>No hay información.</p>
            </div>
        @endforelse
        <div class="card-footer">
            <a href="{{ route('airconditionings.index', $school) }}" class="btn btn-warning">
                <i class="fa fa-fan mr-2"></i> Ver más
            </a>
        </div>
    </div>

    <div class="card card-warning">
        <div class="card-header mb-4">
            <h3 class="card-title">Calefacción</h3>
        </div>
        <!-- /.card-header -->
        @forelse ($heatings as $heating)
        @if ($heating->subtypeenergy_id == 3)
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Eléctrico</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <strong><i class="fas fa-file-alt mr-1"></i> Número de radiadores</strong>
                        <p class="text-muted">{{ $heating->number_radiators }}</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <strong><i class="fas fa-file-alt mr-1"></i> Potencia</strong>
                        <p class="text-muted">{{ $heating->potency }}</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <strong><i class="fas fa-file-alt mr-1"></i> Modelo</strong>
                        <p class="text-muted">{{ $heating->model }}</p>
                    </div>
                    <div class="col-12">
                        <strong><i class="fas fa-comments mr-1"></i> Otros</strong>
                        <p class="text-muted">{{ $heating->others ? $heating->others : 'No hay comentarios.' }}</p>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        @endif
        @if ($heating->subtypeenergy_id == 4)
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Combustible</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <strong><i class="fas fa-file-alt mr-1"></i> Gas</strong>
                        <p class="text-muted">{{ $heating->gas }}</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <strong><i class="fas fa-file-alt mr-1"></i> Gas Oil</strong>
                        <p class="text-muted">{{ $heating->gasoil }}</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <strong><i class="fas fa-file-alt mr-1"></i> Tipo de caldera</strong>
                        <p class="text-muted">{{ $heating->type_boiler }}</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <strong><i class="fas fa-file-alt mr-1"></i> Número de radiadores</strong>
                        <p class="text-muted">{{ $heating->number_radiators }}</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <strong><i class="fas fa-file-alt mr-1"></i> Volumen de depósito</strong>
                        <p class="text-muted">{{ $heating->tank_volume }}</p>
                    </div>
                    <div class="col-12">
                        <strong><i class="fas fa-comments mr-1"></i> Otros</strong>
                        <p class="text-muted">{{ $heating->others ? $heating->others : 'No hay comentarios.' }}</p>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        @endif
            <hr />
            <!-- /.card-body -->
        @empty
            <div class="card-body">
                <p>No hay información.</p>
            </div>
        @endforelse
        <div class="card-footer">
            <a href="{{ route('heatings.index', $school) }}" class="btn btn-warning">
                <i class="fa fa-fire mr-2"></i> Ver más
            </a>
        </div>
    </div>

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Energía Solar</h3>
        </div>
        <!-- /.card-header -->
        @forelse ($solars as $solar)
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-chart-area mr-1"></i> Superficie total</strong>
                    <p class="text-muted">{{ $solar->total_area }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-solar-panel mr-1"></i> Número de paneles</strong>
                    <p class="text-muted">{{ $solar->number_panels }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-bolt mr-1"></i> Potencia instalada</strong>
                    <p class="text-muted">{{ $solar->installed_potency }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-bullseye mr-1"></i> Marca</strong>
                    <p class="text-muted">{{ $solar->mark }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-bullseye mr-1"></i> Modelo</strong>
                    <p class="text-muted">{{ $solar->model }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <strong><i class="fas fa-bolt mr-1"></i> Energía suministradaa la red</strong>
                    <p class="text-muted">{{ $solar->energy_supplied }}</p>
                </div>
                <div class="col-12">
                    <strong><i class="fas fa-comments mr-1"></i> Otros</strong>
                    <p class="text-muted">{{ $solar->others ? $solar->others : 'No hay comentarios.' }}</p>
                </div>
            </div>
        </div>
            <hr />
            <!-- /.card-body -->
        @empty
            <div class="card-body">
                <p>No hay información.</p>
            </div>
        @endforelse
        <div class="card-footer">
            <a href="{{ route('solars.index', $school) }}" class="btn btn-warning">
                <i class="fa fa-sun mr-2"></i> Ver más
            </a>
        </div>
    </div>

@stop
