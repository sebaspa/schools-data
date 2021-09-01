@extends('adminlte::page')
@section('title', 'Editar usuario')


@section('content_header')
    <h1>Editar usuario</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success my-3">
            <p class="mb-0">{{ session('info') }}</p>
        </div>
    @endif
    <form action="{{ route('users.update', ['user' => $user]) }}" method="POST">
        @csrf
        @method('put')
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="name">Nombres</label>
                        <input type="text" name="name" id="name"
                            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Nombres"
                            value="{{ $user->name }}" required>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="last_name">Apellidos</label>
                        <input type="text" name="last_name" id="last_name"
                            class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}"
                            placeholder="Apellidos" value="{{ $user->last_name }}" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="email">Correo</label>
                        <input type="email" name="email" id="email"
                            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Apellidos"
                            value="{{ $user->email }}" required>
                    </div>
                </div>
                <div class="col-12">
                    <label>Roles</label>
                    @foreach ($roles as $role)
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="{{ 'role-' . $role->id }}" name="roles[]"
                                value="{{ $role->id }}"
                                {{ array_key_exists($role->id, $user->roles->pluck('name', 'id')->toArray()) ? 'checked' : '' }}>
                            <label class="form-check-label" for="{{ 'role-' . $role->id }}">{{ $role->name }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Editar usuario</button>
                </div>
            </div>
        </div>
    </form>
@stop
