@csrf
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                placeholder="Nombre" required minlength="3" maxlength="100" value="{{ old('name', $service->name) }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 mt-4">
        <button class="btn btn-primary" type="submit">{{ $btnText }} servicio</button>
    </div>
</div>
