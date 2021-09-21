@extends('adminlte::page')

@section('title', 'Imágenes')

@section('content_header')
    <h1>Modificar imágen</h1>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Editar foto</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('images.updatebuildings', $image) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                <input type="hidden" name="school" value="{{ $imageData->imageable_id }}">
                <input type="hidden" name="building" value="{{ $imageData->contexts }}">
                @include('images._form_school_building')
            </form>
        </div>
    </div>
@stop
