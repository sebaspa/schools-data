@extends('adminlte::page')
@section('title', 'Crear usuario')


@section('content_header')
    <h1>Crear usuario</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success my-3">
            <p class="mb-0">{{ session('info') }}</p>
        </div>
    @endif
    <form action="{{ route('users.store') }}" method="POST">
        <div class="container">
            @include('user._form', ['btnText' => 'Crear'])
        </div>
    </form>
@stop