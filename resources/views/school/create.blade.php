@extends('adminlte::page')
@section('title', 'Crear escuela')


@section('content_header')
    <h1>Crear escuela</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('info'))
                <div class="alert alert-success my-3">
                    <p class="mb-0">{{ session('info') }}</p>
                </div>
            @endif
            <form action="{{ route('schools.store') }}" method="POST">
                <div class="container-fluid">
                    @include('school._form', ['btnText' => 'Crear'])
                </div>
            </form>
        </div>
    </div>
@stop
