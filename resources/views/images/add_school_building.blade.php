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
                @csrf
                <input type="hidden" name="building" value="{{ $building->id }}">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label id="title">Nombre de la foto</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" min="3" max="250" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label id="image">Foto</label>
                            <input type="file" id="image" name="image"
                                class="form-control @error('image') is-invalid @enderror" accept=".jpg, .jpeg, .png"
                                required>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label id="decription">Descripción</label>
                            <textarea name="description" id="description" rows="5"
                                class="form-control @error('description') is-invalid @enderror"></textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Guardar foto</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
