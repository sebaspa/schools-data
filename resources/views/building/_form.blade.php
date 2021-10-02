@csrf
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                placeholder="Nombre" value="{{ old('name', $building->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea name="description" id="description" rows="5"
                class="form-control @error('description') is-invalid @enderror">{{ old('description', $building->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <button class="btn btn-warning" type="submit">{{ $btnText }} contrucción</button>
    </div>
</div>
