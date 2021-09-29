@extends('adminlte::page')
@section('title', 'Crear climatización')


@section('content_header')
    <h1>Crear climatización</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success my-3">
            <p class="mb-0">{{ session('info') }}</p>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h4>Centralizado</h4>
        </div>
        <div class="card-body">

            <form action="{{ route('airconditionings.store') }}" method="POST">
                <div class="container-fluid">
                    <input type="hidden" name="school_id" value="{{ $school->id }}">
                    <input type="hidden" name="subtypeenergy_id" value="1">
                    @include('energy.airconditioning._form_c', ['btnText' => 'Guardar'])
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4>Parcial</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('airconditionings.store') }}" method="POST">
                <div class="container-fluid">
                    <input type="hidden" name="school_id" value="{{ $school->id }}">
                    <input type="hidden" name="subtypeenergy_id" value="2">
                    @include('energy.airconditioning._form_p', ['btnText' => 'Guardar'])
                </div>
            </form>
        </div>
    </div>
@stop
