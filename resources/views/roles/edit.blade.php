@extends('adminlte::page')
@section('title', 'Editar rol')


@section('content_header')
    <h1>Editar rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('info'))
                <div class="alert alert-success my-3">
                    <p class="mb-0">{{ session('info') }}</p>
                </div>
            @endif
            <form action="{{ route('roles.update', ['role' => $role]) }}" method="POST">
                @method('patch')
                <div class="container-fluid">
                    @include('roles._form', ['btnText' => 'Editar'])
                </div>
            </form>
        </div>
    </div>
@stop