@extends('adminlte::page')
@section('title', 'Editar energía solar')


@section('content_header')
    <h1>Editar energía solar</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('info'))
                <div class="alert alert-success my-3">
                    <p class="mb-0">{{ session('info') }}</p>
                </div>
            @endif
            <form action="{{ route('solars.update', ['solar' => $solar]) }}" method="POST">
                @method('patch')
                <div class="container-fluid">
                    @include('energy.solar._form', ['btnText' => 'Editar'])
                </div>
            </form>
        </div>
    </div>
@stop
