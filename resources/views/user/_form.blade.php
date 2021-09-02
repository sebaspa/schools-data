@csrf
<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="name">Nombres</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                placeholder="Nombres" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="last_name">Apellidos</label>
            <input type="text" name="last_name" id="last_name"
                class="form-control @error('last_name') is-invalid @enderror" placeholder="Apellidos"
                value="{{ old('last_name', $user->last_name) }}" required>
            @error('last_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="email">Correo</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                placeholder="Correo" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password"
                class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña"
                value="">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 mb-3">
        <label>Roles</label>
        @foreach ($roles as $role)
            <div class="form-check mb-1">
                <input type="checkbox" class="form-check-input" id="{{ 'role-' . $role->id }}" name="roles[]"
                    value="{{ $role->id }}"
                    {{ array_key_exists($role->id, $user->roles->pluck('name', 'id')->toArray()) ? 'checked' : '' }}>
                <label class="form-check-label" for="{{ 'role-' . $role->id }}">{{ $role->name }}</label>
            </div>
        @endforeach
    </div>
</div>
<div class="row">
    <div class="col-12">
        <button class="btn btn-primary" type="submit">{{ $btnText }} usuario</button>
    </div>
</div>
