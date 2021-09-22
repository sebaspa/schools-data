@extends('adminlte::page')
@section('title', 'Crear servicio')


@section('content_header')
    <h1>Crear servicio</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('info'))
                <div class="alert alert-success my-3">
                    <p class="mb-0">{{ session('info') }}</p>
                </div>
            @endif
            <form action="{{ route('services.store') }}" method="POST">
                <div class="container-fluid">
                    @include('services._form', ['btnText' => 'Crear'])
                </div>
            </form>
        </div>
    </div>
@stop