@extends('adminlte::page')
@section('title', 'Escuela')

@section('content_header')
    <div class="row">
        <div class="col-12">
            <button class="btn btn-success btn-print mb-3"><i class="fa fa-print mr-2"></i> Imprimir</button>
        </div>
        <div class="col-12 col-md-6">
            <h1>Información de la escuela</h1>
        </div>
        <div class="col-12 col-md-6">
            <a href="{{ route('schools.edit', $school) }}" class="btn btn-sm btn-danger float-right">
                <i class="fas fa-edit mr-1 text-white"></i>
                Editar escuela
            </a>
        </div>
    </div>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success my-3">
            <p class="mb-0">{{ session('info') }}</p>
        </div>
    @endif
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Principal</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-school mr-1 text-red"></i> Código</h5>
                    <p class="lead">{{ $school->code }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-school mr-1 text-red"></i> Nombre</h5>
                    <p class="lead">{{ $school->name }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-map-marker-alt mr-1 text-red"></i> Dirección</h5>
                    <p class="lead">{{ $school->address }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-map-marked-alt mr-1 text-red"></i> Distrito</h5>
                    <p class="lead">{{ $school->district }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-phone mr-1 text-red"></i> Teléfono</h5>
                    <p class="lead">{{ $school->phone }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-fax mr-1 text-red"></i> Fax</h5>
                    <p class="lead">{{ $school->fax }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="far fa-envelope mr-1 text-red"></i> Email</h5>
                    <p class="lead">{{ $school->email }}</p>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <h5 class="text-bold"><i class="fas fa-user-shield mr-1 text-red"></i> Responsable</h5>
                    <p class="lead">{{ $school->liable }}</p>
                </div>
                <div class="col-12">
                    <h5 class="text-bold"><i class="fas fa-question mr-1 text-red"></i> Otros</h5>
                    <p class="lead">{{ $school->others != '' ? $school->others : 'No hay información.' }}</p>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

    @if (!$school->buildings->isEmpty())
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Filiaciones</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($school->buildings as $building)
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="small-box bg-danger">
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

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Planimetría</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <p>Planos</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-drafting-compass"></i>
                        </div>
                        <a href="{{ route('plans.index', $school) }}" class="small-box-footer">
                            Ver planos <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Energía eléctrica</h3>
        </div>
        <!-- /.card-header -->
        @forelse ($electrics as $electric)
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Tipo de contrato</h5>
                        <p class="lead">{{ $electric->contract_type }}</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <h5 class="text-bold"><i class="fas fa-charging-station mr-1 text-red"></i> Número de
                            suministro</h5>
                        <p class="lead">{{ $electric->supply_number }}</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <h5 class="text-bold"><i class="fas fa-lightbulb mr-1 text-red"></i> Número de contador</h5>
                        <p class="lead">{{ $electric->number_light_meter }}</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <h5 class="text-bold"><i class="fas fa-bolt mr-1 text-red"></i> Potencia contratada</h5>
                        <p class="lead">{{ $electric->hired_potency }}</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <h5 class="text-bold"><i class="fas fa-bolt mr-1 text-red"></i> Potencia total</h5>
                        <p class="lead">{{ $electric->total_potency }}</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <h5 class="text-bold"><i class="fas fa-plug mr-1 text-red"></i> Acometida general</h5>
                        <p class="lead">{{ $electric->general_rush }}</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <h5 class="text-bold"><i class="fas fa-battery-three-quarters mr-1 text-red"></i> Número de
                            circuitos</h5>
                        <p class="lead">{{ $electric->number_circuits }}</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <h5 class="text-bold"><i class="fas fa-solar-panel mr-1 text-red"></i> Número de cuadros
                            parcial</h5>
                        <p class="lead">{{ $electric->partial_squares }}</p>
                    </div>
                    <div class="col-12">
                        <h5 class="text-bold"><i class="fas fa-comments mr-1 text-red"></i> Otros</h5>
                        <p class="lead">{{ $electric->others ? $electric->others : 'No hay comentarios.' }}
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
            <a href="{{ route('electrics.index', $school) }}" class="btn btn-info">
                <i class="fa fa-bolt mr-2"></i> Ver más
            </a>
        </div>
    </div>

    <div class="card card-info">
        <div class="card-header mb-4">
            <h3 class="card-title">Climatización</h3>
        </div>
        <!-- /.card-header -->
        @forelse ($airconditionings as $airconditioning)
            @if ($airconditioning->subtypeenergy_id == 1)
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Centralizado</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4">
                                <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Potencia</h5>
                                <p class="lead">{{ $airconditioning->potency }}</p>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Frigoria</h5>
                                <p class="lead">{{ $airconditioning->frigoria }}</p>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Marca</h5>
                                <p class="lead">{{ $airconditioning->mark }}</p>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Modelo</h5>
                                <p class="lead">{{ $airconditioning->model }}</p>
                            </div>
                            <div class="col-12">
                                <h5 class="text-bold"><i class="fas fa-comments mr-1 text-red"></i> Otros</h5>
                                <p class="lead">
                                    {{ $airconditioning->others ? $airconditioning->others : 'No hay comentarios.' }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            @endif
            @if ($airconditioning->subtypeenergy_id == 2)
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Parcial</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4">
                                <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Número de grupos
                                </h5>
                                <p class="lead">{{ $airconditioning->number_groups }}</p>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Tipos</h5>
                                <p class="lead">{{ $airconditioning->types }}</p>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Marca</h5>
                                <p class="lead">{{ $airconditioning->mark }}</p>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Modelo</h5>
                                <p class="lead">{{ $airconditioning->model }}</p>
                            </div>
                            <div class="col-12">
                                <h5 class="text-bold"><i class="fas fa-comments mr-1 text-red"></i> Otros</h5>
                                <p class="lead">
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
            <a href="{{ route('airconditionings.index', $school) }}" class="btn btn-info">
                <i class="fa fa-fan mr-2"></i> Ver más
            </a>
        </div>
    </div>

    <div class="card card-info">
        <div class="card-header mb-4">
            <h3 class="card-title">Calefacción</h3>
        </div>
        <!-- /.card-header -->
        @forelse ($heatings as $heating)
            @if ($heating->subtypeenergy_id == 3)
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Eléctrico</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4">
                                <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Número de
                                    radiadores</h5>
                                <p class="lead">{{ $heating->number_radiators }}</p>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Potencia</h5>
                                <p class="lead">{{ $heating->potency }}</p>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Modelo</h5>
                                <p class="lead">{{ $heating->model }}</p>
                            </div>
                            <div class="col-12">
                                <h5 class="text-bold"><i class="fas fa-comments mr-1 text-red"></i> Otros</h5>
                                <p class="lead">
                                    {{ $heating->others ? $heating->others : 'No hay comentarios.' }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            @endif
            @if ($heating->subtypeenergy_id == 4)
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Combustible</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4">
                                <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Gas</h5>
                                <p class="lead">{{ $heating->gas }}</p>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Gas Oil</h5>
                                <p class="lead">{{ $heating->gasoil }}</p>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Tipo de caldera
                                </h5>
                                <p class="lead">{{ $heating->type_boiler }}</p>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Número de
                                    radiadores</h5>
                                <p class="lead">{{ $heating->number_radiators }}</p>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <h5 class="text-bold"><i class="fas fa-file-alt mr-1 text-red"></i> Volumen de
                                    depósito</h5>
                                <p class="lead">{{ $heating->tank_volume }}</p>
                            </div>
                            <div class="col-12">
                                <h5 class="text-bold"><i class="fas fa-comments mr-1 text-red"></i> Otros</h5>
                                <p class="lead">
                                    {{ $heating->others ? $heating->others : 'No hay comentarios.' }}</p>
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
            <a href="{{ route('heatings.index', $school) }}" class="btn btn-info">
                <i class="fa fa-fire mr-2"></i> Ver más
            </a>
        </div>
    </div>

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Energía Solar</h3>
        </div>
        <!-- /.card-header -->
        @forelse ($solars as $solar)
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
                        <h5 class="text-bold"><i class="fas fa-bolt mr-1 text-red"></i> Energía suministradaa la red
                        </h5>
                        <p class="lead">{{ $solar->energy_supplied }}</p>
                    </div>
                    <div class="col-12">
                        <h5 class="text-bold"><i class="fas fa-comments mr-1 text-red"></i> Otros</h5>
                        <p class="lead">{{ $solar->others ? $solar->others : 'No hay comentarios.' }}</p>
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
            <a href="{{ route('solars.index', $school) }}" class="btn btn-info">
                <i class="fa fa-sun mr-2"></i> Ver más
            </a>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(".btn-print").on("click", function() {
            window.print();
        });
    </script>
@stop
