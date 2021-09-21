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
            @if (session('info'))
                <div class="alert alert-success my-3">
                    <p class="mb-0">{{ session('info') }}</p>
                </div>
            @endif
            @if ($images->count() > 0)
                <div class="row">
                    @foreach ($images as $image)
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="card h-100">
                                <div class="position-relative">
                                    <img class="card-img-top" width="100%" height="240" style="object-fit: cover;"
                                        src="{{ asset('storage/' . $image->url) }}" alt="{{ $image->title }}">
                                    <form action="{{ route('images.destroy', $image) }}" method="POST"
                                        class="position-absolute" style="top: 0px;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn" type="submit">
                                            <i class="fa fa-trash text-danger"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('images.editimages_school_building', $image) }}"
                                        class="position-absolute" style="right: 10px; top: 5px;">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $image->title }}</h5>
                                    <p class="card-text">{{ $image->description }}</p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">{{ $image->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-warning" role="alert">
                    No hay imágenes para mostrar aún.
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
