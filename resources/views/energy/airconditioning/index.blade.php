@extends('adminlte::page')
@section('title', 'Climatización')

@section('content_header')
    <a href="{{ route('airconditionings.create', $school) }}" class="btn btn-sm btn-warning float-right">
        <i class="fas fa-user-cog mr-1"></i>
        Crear Climatización
    </a>
    <h1>Climatización</h1>
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
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Tipo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($airconditionings as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->mark }}</td>
                            <td>{{ $item->model }}</td>
                            <td>
                                {{$item->subtypeenergy_id == 1 ? 'Centralizado' : 'Parcial' }}
                            </td>
                            <td width="130">
                                <div class="d-flex">
                                    <a href="{{ route('airconditionings.show', $item) }}" class="mx-1 btn btn-xs btn-warning">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('airconditionings.edit', $item) }}" class="mx-1 btn btn-xs btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('airconditionings.destroy', $item) }}" method="POST">
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
        <div class="mx-3">
            {{ $airconditionings->onEachSide(5)->links() }}
        </div>
    </div>
@stop
