@extends('adminlte::page')
@section('title', 'Editar plano')


@section('content_header')
    <h1>Editar plano</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('info'))
                <div class="alert alert-success my-3">
                    <p class="mb-0">{{ session('info') }}</p>
                </div>
            @endif
            <form action="{{ route('plans.update', ['plan' => $plan]) }}" method="POST" enctype="multipart/form-data">
                @method('patch')
                <div class="container-fluid">
                    @include('plans._form', ['btnText' => 'Editar'])
                </div>
            </form>
        </div>
    </div>
@stop