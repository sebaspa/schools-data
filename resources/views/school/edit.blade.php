@extends('adminlte::page')
@section('title', 'Editar escuela')


@section('content_header')
    <h1>Editar escuela</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('info'))
                <div class="alert alert-success my-3">
                    <p class="mb-0">{{ session('info') }}</p>
                </div>
            @endif
            <form action="{{ route('schools.update', ['school' => $school]) }}" method="POST">
                @method('patch')
                <div class="container-fluid">
                    @include('school._form', ['btnText' => 'Editar'])
                </div>
            </form>
        </div>
    </div>
@stop