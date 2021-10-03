@csrf
<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="potency">Potencia</label>
            <input type="text" class="form-control @error('potency') is-invalid @enderror" id="potency"
                name="potency" value="{{ old('potency', $airconditioning->potency) }}" required>
            @error('potency')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="frigoria">Frigorias</label>
            <input type="text" class="form-control @error('frigoria') is-invalid @enderror" id="frigoria"
                name="frigoria" value="{{ old('frigoria', $airconditioning->frigoria) }}" required>
            @error('frigoria')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="mark">Marca</label>
            <input type="text" class="form-control @error('mark') is-invalid @enderror" id="mark" name="mark"
                value="{{ old('mark', $airconditioning->mark) }}" required>
            @error('mark')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="model">Modelo</label>
            <input type="text" class="form-control @error('model') is-invalid @enderror" id="model" name="model"
                value="{{ old('model', $airconditioning->model) }}" required>
            @error('model')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="others">Otros</label>
            <textarea name="others" id="others" rows="5"
                class="form-control @error('others') is-invalid @enderror">{{ old('others', $airconditioning->others) }}</textarea>
            @error('others')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-warning">{{ $btnText }}</button>
    </div>
</div>
