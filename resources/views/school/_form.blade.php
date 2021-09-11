@csrf
<div class="row">
    <div class="col-12">
        <h4>Filiación</h4>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                placeholder="Nombre" value="{{ old('name', $school->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="address">Dirección</label>
            <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror"
                placeholder="Dirección" value="{{ old('address', $school->address) }}" required>
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="district">Distrito</label>
            <input type="text" name="district" id="district"
                class="form-control @error('district') is-invalid @enderror" placeholder="Distrito"
                value="{{ old('district', $school->district) }}" required>
            @error('district')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="phone">Teléfono</label>
            <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror"
                placeholder="Teléfono" value="{{ old('phone', $school->phone) }}" required>
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="fax">Fax</label>
            <input type="text" name="fax" id="fax" class="form-control @error('fax') is-invalid @enderror"
                placeholder="Fax" value="{{ old('fax', $school->fax) }}" required>
            @error('fax')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                placeholder="Correo electrónico" value="{{ old('email', $school->email) }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="liable">Responsable</label>
            <input type="text" name="liable" id="liable" class="form-control @error('liable') is-invalid @enderror"
                placeholder="Responsable" value="{{ old('liable', $school->liable) }}" required>
            @error('liable')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="others">Otros</label>
            <textarea name="others" id="others" rows="5"
                class="form-control @error('others') is-invalid @enderror">{{ old('others', $school->others) }}</textarea>
            @error('others')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <button class="btn btn-primary" type="submit">{{ $btnText }} escuela</button>
    </div>
</div>
