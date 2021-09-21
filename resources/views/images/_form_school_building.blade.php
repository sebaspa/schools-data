@csrf
<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label id="title">Nombre de la foto</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" min="3"
                max="250" value="{{ old('title', $image->title) }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label id="image">Foto</label>
            <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror"
                accept=".jpg, .jpeg, .png">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label id="decription">Descripción</label>
            <textarea name="description" id="description" rows="5"
                class="form-control @error('description') is-invalid @enderror">{{ old('description', $image->description) }}
            </textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Guardar foto</button>
    </div>
</div>
