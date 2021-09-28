@extends('adminlte::page')
@section('title', 'Crear energía eléctrica')


@section('content_header')
    <h1>Crear energia eléctrica</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('info'))
                <div class="alert alert-success my-3">
                    <p class="mb-0">{{ session('info') }}</p>
                </div>
            @endif
            <form action="{{ route('electrics.store') }}" method="POST">
                <div class="container-fluid">
                    <input type="hidden" name="school_id" value="{{ $school->id }}">
                    @include('energy.electric._form', ['btnText' => 'Guardar'])
                </div>
            </form>
        </div>
    </div>
@stop
