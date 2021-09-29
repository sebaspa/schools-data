@extends('adminlte::page')
@section('title', 'Editar climatización')


@section('content_header')
    <h1>Editar climatización</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success my-3">
            <p class="mb-0">{{ session('info') }}</p>
        </div>
    @endif
    @if ($airconditioning->subtypeenergy_id == 1)
    <div class="card">
        <div class="card-header">
            <h4>Centralizado</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('airconditionings.update', ['airconditioning' => $airconditioning]) }}" method="POST">
                @method('patch')
                <div class="container-fluid">
                    <input type="hidden" name="subtypeenergy_id" value="1">
                    @include('energy.airconditioning._form_c', ['btnText' => 'Editar'])
                </div>
            </form>
        </div>
    </div>
    @endif
    @if ($airconditioning->subtypeenergy_id == 2)
    <div class="card">
        <div class="card-header">
            <h4>Parcial</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('airconditionings.update', ['airconditioning' => $airconditioning]) }}" method="POST">
                @method('patch')
                <div class="container-fluid">
                    <input type="hidden" name="subtypeenergy_id" value="2">
                    @include('energy.airconditioning._form_p', ['btnText' => 'Editar'])
                </div>
            </form>
        </div>
    </div>
    @endif
@stop
