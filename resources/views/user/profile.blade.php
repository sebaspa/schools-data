@extends('adminlte::page')
@section('title', 'Mi perfil')

@section('content_header')
    <h1>Perfil del usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('info'))
                <div class="alert alert-success my-3">
                    <p class="mb-0">{{ session('info') }}</p>
                </div>
            @endif
            <div class="container-fluid">
                <form action="{{ route('users.updateprofile') }}" method="POST">
                    @csrf
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">Nombres</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Nombres"
                                        value="{{ old('name', $user->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="last_name">Apellidos</label>
                                    <input type="text" name="last_name" id="last_name"
                                        class="form-control @error('last_name') is-invalid @enderror"
                                        placeholder="Apellidos" value="{{ old('last_name', $user->last_name) }}" required>
                                    @error('last_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="email">Correo</label>
                                    <input type="email" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror" placeholder="Correo"
                                        value="{{ old('email', $user->email) }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input type="password" name="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Contraseña" value="">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <label class="d-block">Roles asignados:</label>
                                @forelse ($user->roles->pluck('name') as $role)
                                    <span class="badge bg-primary">
                                        {{ $role }}
                                    </span>
                                    @empty
                                    <span class="badge bg-danger">
                                        No hay roles asignados
                                    </span>
                                @endforelse
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Modificar mis datos</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
