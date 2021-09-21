@extends('adminlte::page')

@section('title', 'Imágenes')

@section('content_header')
    <a href="{{ route('schools.show', $school) }}" class="btn btn-sm btn-secondary float-right">
        <i class="fas fa-eye mr-1"></i>
        Ver escuela
    </a>
    <h1>Agregar imágen</h1>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $building->name }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('images.storebuildings', $school) }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="building" value="{{ $building->id }}">
                @include('images._form_school_building')
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <a href="{{ route('schools.show_building_images', [$school, $building->id]) }}"
                class="btn btn-success"><i class="fa fa-images"></i> Ver fotos de {{ $building->name }}</a>
        </div>
    </div>
@stop
