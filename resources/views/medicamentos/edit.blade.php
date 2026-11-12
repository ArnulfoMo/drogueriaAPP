
@extends('layout.admin')

@section('titulo', 'Editar Medicamento')

@section('contenido')

<h1 class="h3 mb-4">Editar Medicamento</h1>

<div class="card shadow-sm mb-4">

    <div class="card-header">
        <i class="bi bi-pencil-square"></i>
        Editar: {{ $medicamento->nombre }}
    </div>

    <div class="card-body">

        <form action="{{ route('medicamentos.update', $medicamento->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Código SKU *</label>
                    <input type="text" name="codigo"
                           class="form-control @error('codigo') is-invalid @enderror"
                           value="{{ old('codigo', $medicamento->codigo) }}" required>
                    @error('codigo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Nombre *</label>
                    <input type="text" name="nombre"
                           class="form-control @error('nombre') is-invalid @enderror"
                           value="{{ old('nombre', $medicamento->nombre) }}" required>
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Categoría *</label>
                    <select name="categoria"
                            class="form-select @error('categoria') is-invalid @enderror"
                            required>

                        <option value="">Seleccione una categoría</option>

                        @foreach(['Antibióticos', 'Analgésicos', 'Sueros', 'Material Quirúrgico', 'Vitaminas'] as $categoria)
                            <option value="{{ $categoria }}"
                                @selected(old('categoria', $medicamento->categoria) == $categoria)>
                                {{ $categoria }}
                            </option>
                        @endforeach

                    </select>
                    @error('categoria')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Laboratorio *</label>
                    <input type="text" name="laboratorio"
                           class="form-control @error('laboratorio') is-invalid @enderror"
                           value="{{ old('laboratorio', $medicamento->laboratorio) }}" required>
                    @error('laboratorio')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Precio (L) *</label>
                    <input type="number" name="precio" step="0.01" min="0.01"
                           class="form-control @error('precio') is-invalid @enderror"
                           value="{{ old('precio', $medicamento->precio) }}" required>
                    @error('precio')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Costo (L) *</label>
                    <input type="number" name="costo" step="0.01" min="0"
                           class="form-control @error('costo') is-invalid @enderror"
                           value="{{ old('costo', $medicamento->costo) }}" required>
                    @error('costo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Inventario *</label>
                    <input type="number" name="inventario" min="0" step="1"
                           class="form-control @error('inventario') is-invalid @enderror"
                           value="{{ old('inventario', $medicamento->inventario) }}" required>
                    @error('inventario')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Fecha de vencimiento *</label>
                    <input type="date" name="fecha_vencimiento"
                           class="form-control @error('fecha_vencimiento') is-invalid @enderror"
                           value="{{ old('fecha_vencimiento', $medicamento->fecha_vencimiento) }}" required>
                    @error('fecha_vencimiento')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Fecha de registro *</label>
                    <input type="date" name="fecha_registro"
                           class="form-control @error('fecha_registro') is-invalid @enderror"
                           value="{{ old('fecha_registro', $medicamento->fecha_registro) }}" required>
                    @error('fecha_registro')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Número de lote *</label>
                    <input type="text" name="numero_lote"
                           class="form-control @error('numero_lote') is-invalid @enderror"
                           value="{{ old('numero_lote', $medicamento->numero_lote) }}" required>
                    @error('numero_lote')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Fotografía (opcional)</label>
                    <input type="file" name="imagen"
                           accept=".jpg,.jpeg,.png,.webp"
                           class="form-control @error('imagen') is-invalid @enderror">

                    <div class="form-text">
                        JPG, PNG o WEBP. Máximo 5 MB.
                        Si no seleccionas otra imagen, se conserva la actual.
                    </div>

                    @error('imagen')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    @if($medicamento->imagen)
                        <div class="mt-3">
                            <p class="mb-2">Fotografía actual:</p>

                            <img src="{{ asset('storage/' . $medicamento->imagen) }}"
                                 alt="Fotografía de {{ $medicamento->nombre }}"
                                 class="img-thumbnail"
                                 style="max-width: 150px; max-height: 150px; object-fit: cover;">
                        </div>
                    @endif
                </div>

            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('medicamentos.index') }}"
                   class="btn btn-secondary">
                    Cancelar
                </a>

                <button type="submit" class="btn btn-warning">
                    <i class="bi bi-save"></i>
                    Actualizar Medicamento
                </button>
            </div>

        </form>

    </div>
</div>

@endsection
