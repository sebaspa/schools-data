@extends('adminlte::page')
@section('title', 'Energía eléctrica')

@section('content_header')
    <a href="{{ route('electrics.create', $school) }}" class="btn btn-sm btn-danger float-right">
        <i class="fas fa-user-cog mr-1"></i>
        Crear energía eléctrica
    </a>
    <a href="{{ route('schools.edit', $school) }}" class="btn btn-sm btn-danger float-right mr-2">
        <i class="fas fa-school mr-1"></i>
        Filiación
    </a>
    <h1>Energía eléctrica</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success my-3">
            <p class="mb-0">{{ session('info') }}</p>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Típo de contrato</th>
                            <th>Empresa suministradora</th>
                            <th>Número de suministro</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($electrics as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->contract_type }}</td>
                                <td>{{ $item->supplying_company }}</td>
                                <td>{{ $item->supply_number }}</td>
                                <td width="130">
                                    <div class="d-flex">
                                        <a href="{{ route('electrics.show', $item) }}"
                                            class="mx-1 btn btn-xs btn-warning">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('electrics.edit', $item) }}"
                                            class="mx-1 btn btn-xs btn-primary">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('electrics.destroy', $item) }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button class="mx-1 btn btn-xs btn-danger btn-delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <p>No se encontraron resultados.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mx-3">
            {{ $electrics->onEachSide(5)->links() }}
        </div>
    </div>
@stop
