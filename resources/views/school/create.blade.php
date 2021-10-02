@extends('adminlte::page')
@section('title', 'Crear filiación')


@section('content_header')
    <h1>Crear filiación</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Filiación</h4>
        </div>
        <div class="card-body">
            @if (session('info'))
                <div class="alert alert-success my-3">
                    <p class="mb-0">{{ session('info') }}</p>
                </div>
            @endif
            <form action="{{ route('schools.store') }}" method="POST">
                <div class="container-fluid">
                    @include('school._form', ['btnText' => 'Crear'])
                </div>
            </form>
        </div>
    </div>
@stop
