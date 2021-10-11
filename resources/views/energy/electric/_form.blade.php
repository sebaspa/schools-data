@csrf
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="supplying_company">Empresa suministradora</label>
            <input type="text" class="form-control @error('supplying_company') is-invalid @enderror" min="3"
                id="supplying_company" name="supplying_company" value="{{ old('supplying_company', $electric->supplying_company) }}"
                required>
            @error('supplying_company')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="contract_type">Tipo de contrato</label>
            <input type="text" class="form-control @error('contract_type') is-invalid @enderror" min="3"
                id="contract_type" name="contract_type" value="{{ old('contract_type', $electric->contract_type) }}"
                required>
            @error('contract_type')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="supply_number">Número de suministro</label>
            <input type="text" class="form-control @error('supply_number') is-invalid @enderror" min="3"
                id="supply_number" name="supply_number" value="{{ old('supply_number', $electric->supply_number) }}"
                required>
            @error('supply_number')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="number_light_meter">Número de contador</label>
            <input type="text" class="form-control @error('number_light_meter') is-invalid @enderror" min="3"
                id="number_light_meter" name="number_light_meter"
                value="{{ old('number_light_meter', $electric->number_light_meter) }}" required>
            @error('number_light_meter')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="hired_potency">Potencia contratada</label>
            <input type="text" class="form-control @error('hired_potency') is-invalid @enderror" min="3"
                id="hired_potency" name="hired_potency" value="{{ old('hired_potency', $electric->hired_potency) }}"
                required>
            @error('hired_potency')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="total_potency">Potencia total</label>
            <input type="text" class="form-control @error('total_potency') is-invalid @enderror" min="3"
                id="total_potency" name="total_potency" value="{{ old('total_potency', $electric->total_potency) }}"
                required>
            @error('total_potency')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="general_rush">Acometida general</label>
            <input type="text" class="form-control @error('general_rush') is-invalid @enderror" min="3"
                id="general_rush" name="general_rush" value="{{ old('general_rush', $electric->general_rush) }}"
                required>
            @error('general_rush')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="number_circuits">Número de circuitos</label>
            <input type="text" class="form-control @error('number_circuits') is-invalid @enderror" min="3"
                id="number_circuits" name="number_circuits"
                value="{{ old('number_circuits', $electric->number_circuits) }}" required>
            @error('number_circuits')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="partial_squares">Número de cuadros parcial</label>
            <input type="text" class="form-control @error('partial_squares') is-invalid @enderror" min="3"
                id="partial_squares" name="partial_squares"
                value="{{ old('partial_squares', $electric->partial_squares) }}" required>
            @error('partial_squares')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="others">Otros</label>
            <textarea name="others" id="others" rows="5"
                class="form-control @error('others') is-invalid @enderror">{{ old('others', $electric->others) }}</textarea>
            @error('others')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-warning">{{ $btnText }}</button>
    </div>
</div>
