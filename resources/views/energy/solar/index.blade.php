@extends('adminlte::page')
@section('title', 'Energía solar')

@section('content_header')
    <a href="{{ route('solars.create', $school) }}" class="btn btn-sm btn-secondary float-right">
        <i class="fas fa-user-cog mr-1"></i>
        Crear energía solar
    </a>
    <h1>Energía solar</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success my-3">
            <p class="mb-0">{{ session('info') }}</p>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Superficie total</th>
                        <th>Número de panales</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($solars as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->total_area }}</td>
                            <td>{{ $item->number_panels }}</td>
                            <td width="130">
                                <div class="d-flex">
                                    <a href="{{ route('solars.show', $item) }}" class="mx-1 btn btn-xs btn-success">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('solars.edit', $item) }}" class="mx-1 btn btn-xs btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('solars.destroy', $item) }}" method="POST">
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
                            <td colspan="4">
                                <p>No se encontraron resultados.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mx-3">
            {{ $solars->onEachSide(5)->links() }}
        </div>
    </div>
@stop
