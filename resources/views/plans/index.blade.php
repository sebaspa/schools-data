@extends('adminlte::page')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('title', 'Planos')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <a href="{{ route('plans.create', $school) }}" class="btn btn-sm btn-secondary float-right">
        <i class="fas fa-user-cog mr-1"></i>
        Crear planos
    </a>
    <h1>Planos</h1>
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
                        <th>Título</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($plans as $plan)
                        <tr>
                            <td>{{ $plan->id }}</td>
                            <td>{{ $plan->title }}</td>
                            <td width="130">
                                <div class="d-flex">
                                    <a href="{{ route('plans.show', $plan) }}" class="mx-1 btn btn-xs btn-success">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('plans.edit', $plan) }}" class="mx-1 btn btn-xs btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('plans.destroy', $plan) }}" method="POST">
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
                            <td colspan="3">
                                <p>No se encontraron resultados.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mx-3">
            {{ $plans->onEachSide(5)->links() }}
        </div>
    </div>
@stop
