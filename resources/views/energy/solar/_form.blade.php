@csrf
<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="total_area">Superficie total</label>
            <input type="text" class="form-control @error('total_area') is-invalid @enderror" min="3" id="total_area"
                name="total_area" value="{{ old('total_area', $solar->total_area) }}" required>
            @error('total_area')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="number_panels">Número de paneles</label>
            <input type="text" class="form-control @error('number_panels') is-invalid @enderror" min="3"
                id="number_panels" name="number_panels" value="{{ old('number_panels', $solar->number_panels) }}"
                required>
            @error('number_panels')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="installed_potency">Potencia instalada</label>
            <input type="text" class="form-control @error('installed_potency') is-invalid @enderror" min="3"
                id="installed_potency" name="installed_potency"
                value="{{ old('installed_potency', $solar->installed_potency) }}" required>
            @error('installed_potency')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="mark">Marca</label>
            <input type="text" class="form-control @error('mark') is-invalid @enderror" min="3" id="mark" name="mark"
                value="{{ old('mark', $solar->mark) }}" required>
            @error('mark')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="model">Modelo</label>
            <input type="text" class="form-control @error('model') is-invalid @enderror" min="3" id="model" name="model"
                value="{{ old('model', $solar->model) }}" required>
            @error('model')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="energy_supplied">Energía suministrada a la red</label>
            <input type="text" class="form-control @error('energy_supplied') is-invalid @enderror" min="3"
                id="energy_supplied" name="energy_supplied"
                value="{{ old('energy_supplied', $solar->energy_supplied) }}" required>
            @error('energy_supplied')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="others">Otros</label>
            <textarea name="others" id="others" rows="5"
                class="form-control @error('others') is-invalid @enderror">{{ old('others', $solar->others) }}</textarea>
            @error('others')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-info">{{ $btnText }}</button>
    </div>
</div>
