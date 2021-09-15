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
        <h4>Descripción</h4>
    </div>
    <div class="col-12">
        <h5>Construcciones</h5>
    </div>
    <div class="constructions w-100">
        @foreach ($school->buildings as $building_assigned)
            <div class="position-relative row w-100 mb-3">
                <div class="col-12 col-md-6">
                    <input type="hidden" name="building_school[]" value="{{ $building_assigned->pivot->id }}">
                    <div class="form-group">
                        <label>Construccion</label>
                        <select name="building_assigned[]" class="form-control"
                            value="{{ old('building_assigned', $building_assigned->name) }}">
                            <option value="">Seleccione</option>
                            @foreach ($buildings as $building)
                                <option value="{{ $building->id }}"
                                    {{ $building_assigned->pivot->building_id == $building->id ? 'selected' : '' }}>
                                    {{ $building->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Cantidad</label>
                        <input type="number" name="quantity_assigned[]" class="form-control"
                            value="{{ old('quantity_assigned', $building_assigned->pivot->quantity) }}" min="1"
                            required>
                    </div>
                </div>
                <a href="#" class="position-absolute btn-delete-construction"
                    data-id="{{ $building_assigned->pivot->id }}" style="right: 15px;">
                    <i class="fa fa-trash text-danger"></i>
                </a>
            </div>
        @endforeach
    </div>
    <div class="col-12">
        <a href="#" class="btn btn-secondary" id="btn-add">Agregar construcción</a>
    </div>
</div>
<div class="row mt-4">
    <div class="col-12">
        <button class="btn btn-primary" type="submit">{{ $btnText }} escuela</button>
    </div>
</div>

@section('js')
    <script>
        var token = $("meta[name='csrf-token']").attr("content");

        $("#btn-add").on("click", function(e) {
            e.preventDefault();
            $(".constructions").append(`
            <div class="position-relative row w-100 mb-3">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Construccion</label>
                        <select name="building_assigned[]"
                            class="form-control"
                            value="" required>
                            <option value="" selected>Seleccione</option>
                            @foreach ($buildings as $building)
                                <option value="{{ $building->id }}">
                                    {{ $building->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Cantidad</label>
                        <input type="number" name="quantity_assigned[]"
                            class="form-control" placeholder="Cantidad"
                            value="" min="1"
                            required>
                    </div>
                </div>
                <a href="#" data-id="null" class="position-absolute btn-delete-construction" style="right: 15px;">
                    <i class="fa fa-trash text-danger"></i>
                </a>
            </div>
            `);
        });

        $("body").on("click", ".btn-delete-construction", function(e) {
            e.preventDefault();
            var construction_id = $(this).data("id");
            if (construction_id) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('schools.deletebuilding') }}",
                    data: {
                        "id": construction_id,
                        "_token": token
                    },
                    dataType: "JSON",
                    success: function(response) {

                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            }
            $(this).parent().remove();
        });
    </script>
@endsection
