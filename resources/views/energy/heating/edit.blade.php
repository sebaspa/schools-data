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
    @if ($heating->subtypeenergy_id == 3)
        <div class="card">
            <div class="card-header">
                <h4>Eléctrico</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('heatings.update', ['heating' => $heating]) }}" method="POST">
                    @method('patch')
                    <div class="container-fluid">
                        <input type="hidden" name="subtypeenergy_id" value="3">
                        @include('energy.heating._form_e', ['btnText' => 'Editar'])
                    </div>
                </form>
            </div>
        </div>
    @endif
    @if ($heating->subtypeenergy_id == 4)
        <div class="card">
            <div class="card-header">
                <h4>Combustible</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('heatings.update', ['heating' => $heating]) }}" method="POST">
                    @method('patch')
                    <div class="container-fluid">
                        <input type="hidden" name="subtypeenergy_id" value="4">
                        @include('energy.heating._form_c', ['btnText' => 'Editar'])
                    </div>
                </form>
            </div>
        </div>
    @endif
@stop
