@extends('adminlte::page')
@section('title', 'Crear usuario')


@section('content_header')
    <h1>Crear usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('info'))
                <div class="alert alert-success my-3">
                    <p class="mb-0">{{ session('info') }}</p>
                </div>
            @endif
            <form action="{{ route('users.store') }}" method="POST">
                <div class="container-fluid">
                    @include('user._form', ['btnText' => 'Crear'])
                </div>
            </form>
        </div>
    </div>
@stop
