@extends('adminlte::page')
@section('title', 'Editar usuario')


@section('content_header')
    <h1>Editar usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('info'))
                <div class="alert alert-success my-3">
                    <p class="mb-0">{{ session('info') }}</p>
                </div>
            @endif
            <form action="{{ route('users.update', ['user' => $user]) }}" method="POST">
                @method('patch')
                <div class="container-fluid">
                    @include('user._form', ['btnText' => 'Editar'])
                </div>
            </form>
        </div>
    </div>
@stop
