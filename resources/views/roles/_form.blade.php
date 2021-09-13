@csrf
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                placeholder="Nombre" required minlength="3" maxlength="100" value="{{ old('name', $role->name) }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <h4 class="mb-4">Lista de permisos</h4>
        <div class="row">
            @foreach ($permissions as $permission)
                <div class="col-12 col-md-4">
                    <label>
                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="mr-2"
                            {{ array_search($permission->id, array_column($role->permissions->toArray(), 'id')) !== false ? 'checked' : '' }}>
                        {{ $permission->description }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-12 mt-4">
        <button class="btn btn-primary" type="submit">{{ $btnText }} rol</button>
    </div>
</div>
