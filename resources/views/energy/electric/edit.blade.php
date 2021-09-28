@extends('adminlte::page')
@section('title', 'Editar energía eléctrica')


@section('content_header')
    <h1>Editar energía eléctrica</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('info'))
                <div class="alert alert-success my-3">
                    <p class="mb-0">{{ session('info') }}</p>
                </div>
            @endif
            <form action="{{ route('electrics.update', ['electric' => $electric]) }}" method="POST">
                @method('patch')
                <div class="container-fluid">
                    @include('energy.electric._form', ['btnText' => 'Editar'])
                </div>
            </form>
        </div>
    </div>
@stop
