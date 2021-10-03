@csrf
<div class="row">
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="number_groups">Número de grupos</label>
            <input type="text" class="form-control @error('number_groups') is-invalid @enderror"
                id="number_groups" name="number_groups"
                value="{{ old('number_groups', $airconditioning->number_groups) }}" required>
            @error('number_groups')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="types">Tipos</label>
            <input type="text" class="form-control @error('types') is-invalid @enderror" id="types" name="types"
                value="{{ old('types', $airconditioning->types) }}" required>
            @error('types')
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
