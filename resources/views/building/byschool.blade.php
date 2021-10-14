@extends('adminlte::page')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('title', 'Construcciones')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <a href="{{ route('schools.edit', $school) }}" class="btn btn-sm btn-danger float-right mr-2">
        <i class="fas fa-school mr-1"></i>
        Filiación
    </a>
    <h1>Descripciones</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success my-3">
            <p class="mb-0">{{ session('info') }}</p>
        </div>
    @endif
    <form action="{{ route('schools.updatebuildings', $school) }}" method="POST">
        @method('patch')
        <input type="hidden" name="school_id" value="{{ $school->id }}">
        <div class="container-fluid">
            @include('school._form_building_school', ['btnText' => 'Asignar'])
        </div>
    </form>
@endsection
