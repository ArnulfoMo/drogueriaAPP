
@extends('layout.admin')

@section('titulo', 'Editar Proveedor')

@section('contenido')

<h1 class="h3 mb-4">Editar Proveedor</h1>

<div class="card shadow-sm mb-4">

    <div class="card-header">
        <i class="bi bi-pencil-square"></i>
        Editar: {{ $proveedor->empresa }}
    </div>

    <div class="card-body">

        <form action="{{ route('proveedores.update', $proveedor->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label for="rtn" class="form-label">RTN *</label>
                    <input type="text" name="rtn" id="rtn"
                           maxlength="14" pattern="[0-9]{14}"
                           placeholder="Ej: 08011999123456"
                           class="form-control @error('rtn') is-invalid @enderror"
                           value="{{ old('rtn', $proveedor->rtn) }}"
                           required>

                    <div class="form-text">
                        Ingrese exactamente 14 dígitos numéricos, sin guiones.
                    </div>

                    @error('rtn')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="empresa" class="form-label">Empresa *</label>
                    <input type="text" name="empresa" id="empresa"
                           class="form-control @error('empresa') is-invalid @enderror"
                           value="{{ old('empresa', $proveedor->empresa) }}"
                           required>

                    @error('empresa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="contacto" class="form-label">Contacto *</label>
                    <input type="text" name="contacto" id="contacto"
                           class="form-control @error('contacto') is-invalid @enderror"
                           value="{{ old('contacto', $proveedor->contacto) }}"
                           required>

                    @error('contacto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="telefono" class="form-label">Teléfono *</label>
                    <input type="text" name="telefono" id="telefono"
                           maxlength="8" pattern="[2389][0-9]{7}"
                           class="form-control @error('telefono') is-invalid @enderror"
                           value="{{ old('telefono', $proveedor->telefono) }}"
                           required>

                    @error('telefono')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="categoria" class="form-label">Categoría *</label>

                    <select name="categoria" id="categoria"
                            class="form-select @error('categoria') is-invalid @enderror"
                            required>

                        <option value="">Seleccione una categoría</option>

                        @foreach(['Fármacos', 'Material Quirúrgico', 'Equipos'] as $categoria)
                            <option value="{{ $categoria }}"
                                @selected(old('categoria', $proveedor->categoria) == $categoria)>
                                {{ $categoria }}
                            </option>
                        @endforeach

                    </select>

                    @error('categoria')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="limite_credito" class="form-label">
                        Límite de Crédito (L) *
                    </label>

                    <input type="number" name="limite_credito" id="limite_credito"
                           step="0.01" min="0"
                           class="form-control @error('limite_credito') is-invalid @enderror"
                           value="{{ old('limite_credito', $proveedor->limite_credito) }}"
                           required>

                    @error('limite_credito')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="dias_credito" class="form-label">
                        Días de Crédito *
                    </label>

                    <select name="dias_credito" id="dias_credito"
                            class="form-select @error('dias_credito') is-invalid @enderror"
                            required>

                        <option value="">Seleccione el plazo</option>

                        @foreach([15, 30, 45, 60] as $dias)
                            <option value="{{ $dias }}"
                                @selected(old('dias_credito', $proveedor->dias_credito) == $dias)>
                                {{ $dias }} días
                            </option>
                        @endforeach

                    </select>

                    @error('dias_credito')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="estado" class="form-label">Estado *</label>

                    <select name="estado" id="estado"
                            class="form-select @error('estado') is-invalid @enderror"
                            required>

                        <option value="">Seleccione un estado</option>

                        @foreach(['Activo', 'Inactivo'] as $estado)
                            <option value="{{ $estado }}"
                                @selected(old('estado', $proveedor->estado) == $estado)>
                                {{ $estado }}
                            </option>
                        @endforeach

                    </select>

                    @error('estado')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="fecha_registro" class="form-label">
                        Fecha de Registro *
                    </label>

                    <input type="date" name="fecha_registro" id="fecha_registro"
                           class="form-control @error('fecha_registro') is-invalid @enderror"
                           value="{{ old('fecha_registro', $proveedor->fecha_registro) }}"
                           required>

                    @error('fecha_registro')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="d-flex justify-content-end gap-2">

                <a href="{{ route('proveedores.index') }}"
                   class="btn btn-secondary">
                    Cancelar
                </a>

                <button type="submit" class="btn btn-warning">
                    <i class="bi bi-save"></i>
                    Actualizar Proveedor
                </button>

            </div>

        </form>
    </div>
</div>

@endsection
