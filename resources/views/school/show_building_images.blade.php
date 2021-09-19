@extends('adminlte::page')

@section('title', 'Ver imágenes')

@section('content_header')
    <a href="{{ route('schools.show', $school) }}" class="btn btn-sm btn-secondary float-right">
        <i class="fas fa-eye mr-1"></i>
        Ver escuela
    </a>
    <h1>Galería de fotos</h1>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $building->name }} - {{ $school->name }}</h3>
        </div>
        <div class="card-body">
            @if ($images->count() > 0)
                <div class="row">
                    @foreach ($images as $image)
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="card">
                                <img class="card-img-top" width="100%" height="240" style="object-fit: cover;"
                                    src="{{ asset('storage/' . $image->url) }}" alt="{{ $image->title }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $image->title }}</h5>
                                    <p class="card-text">{{ $image->description }}</p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">{{ $image->updated_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-warning" role="alert">
                    No hay imágenes aún, para cargar algunas haz click <a
                        href="{{ route('schools.edit', $school) }}">aquí</a>.
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('images.addimages_school_building', [$school->id, $building->id]) }}"
                        class="btn btn-primary"><i class="fa fa-images"></i> Agregar más fotos</a>
                </div>
            </div>
        </div>
    </div>
@stop
