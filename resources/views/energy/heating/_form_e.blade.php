@csrf
<div class="row">
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
            <label for="potency">Potencia</label>
            <input type="text" class="form-control @error('potency') is-invalid @enderror" id="potency"
                name="potency" value="{{ old('potency', $heating->potency) }}" required>
            @error('potency')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="model">Modelo</label>
            <input type="text" class="form-control @error('model') is-invalid @enderror" id="model"
                name="model" value="{{ old('model', $heating->model) }}" required>
            @error('model')
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
        <button type="submit" class="btn btn-primary">{{ $btnText }}</button>
    </div>
</div>