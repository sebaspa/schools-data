@extends('adminlte::page')
@section('title', 'Crear rol')


@section('content_header')
    <h1>Crear rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('info'))
                <div class="alert alert-success my-3">
                    <p class="mb-0">{{ session('info') }}</p>
                </div>
            @endif
            <form action="{{ route('roles.store') }}" method="POST">
                <div class="container-fluid">
                    @include('roles._form', ['btnText' => 'Crear'])
                </div>
            </form>
        </div>
    </div>
@stop
