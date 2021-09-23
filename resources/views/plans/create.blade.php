@extends('adminlte::page')
@section('title', 'Crear plano')


@section('content_header')
    <h1>Crear plano</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if (session('info'))
                <div class="alert alert-success my-3">
                    <p class="mb-0">{{ session('info') }}</p>
                </div>
            @endif
            <form action="{{ route('plans.store') }}" method="POST" enctype="multipart/form-data">
                <div class="container-fluid">
                    <input type="hidden" name="school_id" value="{{ $school->id }}">
                    @include('plans._form', ['btnText' => 'Crear'])
                </div>
            </form>
        </div>
    </div>
@stop
