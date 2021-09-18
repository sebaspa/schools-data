@csrf

<div class="row">
    <div class="col-12">
        <h4>Construcciones</h4>
    </div>
    <div class="constructions w-100">
        @foreach ($school->buildings as $key => $building_assigned)
            <div class="position-relative row w-100 mb-3">
                <div class="col-12 col-md-6">
                    <input type="hidden" name="building_school[]" value="{{ $building_assigned->pivot->id }}">
                    <div class="form-group">
                        <label>Construccion</label>
                        <select name="building_assigned[]" class="form-control"
                            value="{{ old('building_assigned.' . $key, $building_assigned->name) }}">
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
                        <input type="number" name="quantity_assigned[]"
                            class="form-control @error('quantity_assigned.' . $key) is-invalid @enderror"
                            value="{{ old('quantity_assigned.' . $key, $building_assigned->pivot->quantity) }}"
                            min="1" max="99" required>
                        @error('quantity_assigned.' . $key)
                            <div class="small text-danger">{{ $message }}</div>
                        @enderror
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
        <button class="btn btn-primary" type="submit">{{ $btnText }} construcciones</button>
    </div>
</div>

@section('js')
    <script>
        var token = $("meta[name='csrf-token']").attr("content");

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
