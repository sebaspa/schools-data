@extends('adminlte::page')
@section('title', 'Usuario')

@section('content_header')
    <h1>Información del usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-info card-outline">
                            <div class="card-body box-profile">

                                <h3 class="profile-username text-center">{{ $user->name }} {{ $user->last_name }}</h3>

                                <p class="text-muted text-center">Usuario</p>

                                <strong><i class="fas fa-envelope mr-1 text-red"></i> Correo</strong>

                                <p class="text-muted">
                                    {{ $user->email }}
                                </p>

                                <hr>
                                <strong class="d-block"><i class="fas fa-user-tag mr-1 text-red"></i> Roles</strong>

                                @forelse ($user->roles->pluck('name') as $role)
                                    <span class="badge bg-warning">
                                        {{ $role }}
                                    </span>
                                @empty
                                    <span class="badge bg-danger">
                                        No hay roles asignados
                                    </span>
                                @endforelse

                                <hr>

                                <a href="{{ route('users.edit', $user) }}" class="btn btn-info">
                                    <b>Editar información</b>
                                </a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
