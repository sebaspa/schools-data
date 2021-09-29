@extends('adminlte::page')
@section('title', 'Crear calefacción')


@section('content_header')
    <h1>Crear calefacción</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success my-3">
            <p class="mb-0">{{ session('info') }}</p>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h4>Eléctrico</h4>
        </div>
        <div class="card-body">

            <form action="{{ route('heatings.store') }}" method="POST">
                <div class="container-fluid">
                    <input type="hidden" name="school_id" value="{{ $school->id }}">
                    <input type="hidden" name="subtypeenergy_id" value="3">
                    @include('energy.heating._form_e', ['btnText' => 'Guardar'])
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4>Combustible</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('heatings.store') }}" method="POST">
                <div class="container-fluid">
                    <input type="hidden" name="school_id" value="{{ $school->id }}">
                    <input type="hidden" name="subtypeenergy_id" value="4">
                    @include('energy.heating._form_c', ['btnText' => 'Guardar'])
                </div>
            </form>
        </div>
    </div>
@stop
