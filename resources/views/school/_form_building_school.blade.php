@csrf
<div class="row">
    @forelse ($buildings as $key => $item)
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $item->name }}</h3>
                </div>
                <div class="card-body">
                    <input type="hidden" name="building_id[]" value="{{ $item->id }}">
                    <div class="form-group">
                        <label for="quantity">Cantidad</label>
                        <input type="number" name="quantity[]"
                            class="form-control @error('quantity.' . $key) is-invalid @enderror" placeholder="Cantidad"
                            value="{{ old('quantity.' . $key, ($school->buildings->count() > 0) ? $school->buildings[$key]["pivot"]["quantity"] : 0) }}" min="0" max="99" required>
                        @error('quantity.' . $key)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="others">Otros</label>
                        <textarea name="others[]" rows="5"
                            class="form-control @error('others.' . $key) is-invalid @enderror">{{ old('others.' . $key, ($school->buildings->count() > 0) ? $school->buildings[$key]["pivot"]["others"] : '') }}</textarea>
                        @error('others.' . $key)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                @if ($school->buildings->count() > 0)
                <div class="card-footer">
                    <a href="{{ route('schools.show_building_images', [$school, $item->id]) }}" class="btn btn-warning">
                        <i class="fa fa-images mr-2"></i>
                        Fotos
                    </a>
                </div>
                @endif
            </div>
        </div>
    @empty
        <div class="alert alert-warning my-3">
            <p class="mb-0">No hay construcciones asignadas.</p>
        </div>
    @endforelse
</div>
<div class="row mt-4 pb-5">
    <div class="col-12">
        <button class="btn btn-info" type="submit">{{ $btnText }}</button>
    </div>
</div>
