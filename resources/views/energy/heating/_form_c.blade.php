@csrf
<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="gas">Gas</label>
            <input type="text" class="form-control @error('gas') is-invalid @enderror" id="gas"
                name="gas" value="{{ old('gas', $heating->gas) }}" required>
            @error('gas')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="gasoil">Gas Oil</label>
            <input type="text" class="form-control @error('gasoil') is-invalid @enderror" id="gasoil"
                name="gasoil" value="{{ old('gasoil', $heating->gasoil) }}" required>
            @error('gasoil')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="type_boiler">Tipo de caldera</label>
            <input type="text" class="form-control @error('type_boiler') is-invalid @enderror" id="type_boiler"
                name="type_boiler" value="{{ old('type_boiler', $heating->type_boiler) }}" required>
            @error('type_boiler')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="number_radiators">Número de radiadores</label>
            <input type="text" class="form-control @error('number_radiators') is-invalid @enderror" id="number_radiators"
                name="number_radiators" value="{{ old('number_radiators', $heating->number_radiators) }}" required>
            @error('number_radiators')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="tank_volume">Volumen de depósito</label>
            <input type="text" class="form-control @error('tank_volume') is-invalid @enderror" id="tank_volume"
                name="tank_volume" value="{{ old('tank_volume', $heating->tank_volume) }}" required>
            @error('tank_volume')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="others">Otros</label>
            <textarea name="others" id="others" rows="5"
                class="form-control @error('others') is-invalid @enderror">{{ old('others', $heating->others) }}</textarea>
            @error('others')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-warning">{{ $btnText }}</button>
    </div>
</div>