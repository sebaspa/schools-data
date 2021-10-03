@extends('adminlte::page')
@section('title', 'Editar descripción')


@section('content_header')
    <h1>Editar descripción</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('info'))
                <div class="alert alert-success my-3">
                    <p class="mb-0">{{ session('info') }}</p>
                </div>
            @endif
            <form action="{{ route('buildings.update', ['building' => $building]) }}" method="POST">
                @method('patch')
                <div class="container-fluid">
                    @include('building._form', ['btnText' => 'Editar'])
                </div>
            </form>
        </div>
    </div>
@stop