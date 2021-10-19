@csrf
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" value="{{ old('title', $plan->title) }}" name="title" id="title"
                class="form-control @error('title') is-invalid @enderror" min="3" max="200" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label id="document">Documento</label>
            <input type="file" id="document" name="document" class="form-control @error('document') is-invalid @enderror"
                accept=".jpg, .jpeg, .png, .pdf">
            <small>Se debe subir archivos formato .jpg, .png y .pdf</small>
            @error('document')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        @if ($plan->document)
            <a href="/storage/{{ $plan->document }}" class="btn btn-info mb-4" target="_blank">
                <i class="fa fa-eye mr-2"></i>Ver planimetría
            </a>
        @endif
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="service">Servicios</label>
            <select name="service_id" id="service" class="form-control" required>
                <option value="">Seleccione</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}" {{ $service->id == $plan->service_id ? 'selected' : '' }}>
                        {{ $service->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label id="document_free">Documento libre</label>
            <input type="file" id="document_free" name="document_free" class="form-control @error('document_free') is-invalid @enderror">
            @error('document_free')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        @if ($plan->document_free)
            <a href="/storage/{{ $plan->document_free }}" class="btn btn-info mb-4" target="_blank">
                <i class="fa fa-eye mr-2"></i>Ver planimetría
            </a>
        @endif
    </div>
    <div class="col-12">
        <div class="form-group">
            <label id="decription">Descripción</label>
            <textarea name="description" id="description" rows="5"
                class="form-control @error('description') is-invalid @enderror">{{ old('description', $plan->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-info">{{ $btnText }}</button>
    </div>
</div>
