@extends('adminlte::page')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
@section('title', 'Construcciones')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1>Construcciones</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success my-3">
            <p class="mb-0">{{ session('info') }}</p>
        </div>
    @endif
    <form action="{{ route('schools.updatebuildings', $school) }}" method="POST">
        @method('patch')
        <div class="container-fluid">
            @include('school._form_building_school', ['btnText' => 'Editar'])
        </div>
    </form>
@endsection
