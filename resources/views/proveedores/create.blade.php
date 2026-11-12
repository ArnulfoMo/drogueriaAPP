
@extends('layout.admin')

@section('titulo', 'Registrar Proveedor')

@section('contenido')

<h1 class="h3 mb-4">Registrar Proveedor</h1>

<div class="card shadow-sm mb-4">

    <div class="card-header">
        <i class="bi bi-plus-circle"></i>
        Nuevo Proveedor
    </div>

    <div class="card-body">

        <form action="{{ route('proveedores.store') }}" method="POST">
            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label for="rtn" class="form-label">RTN *</label>
                    <input  type="text" name="rtn" id="rtn"
                            maxlength="14" pattern="[0-9]{14}"
                            placeholder="Ej: 08011999123456"
                            class="form-control @error('rtn') is-invalid @enderror"
                            value="{{ old('rtn') }}" required>

                    <div class="form-text">
                        Ingrese exactamente 14 dígitos numéricos, sin guiones.
                    </div>

                    @error('rtn')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="empresa" class="form-label">Empresa *</label>
                    <input  type="text" name="empresa" id="empresa"
                            placeholder="Ej: Laboratorios Farmacéuticos S.A."
                            class="form-control @error('empresa') is-invalid @enderror"
                            value="{{ old('empresa') }}" required>

                    @error('empresa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="contacto" class="form-label">Contacto *</label>
                    <input  type="text" name="contacto" id="contacto"
                            placeholder="Ej: Juan Pérez"
                            class="form-control @error('contacto') is-invalid @enderror"
                            value="{{ old('contacto') }}" required>

                    @error('contacto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="telefono" class="form-label">Teléfono *</label>
                    <input  type="text" name="telefono" id="telefono"
                            maxlength="8" pattern="[2389][0-9]{7}"
                            placeholder="Ej: 98765432"
                            class="form-control @error('telefono') is-invalid @enderror"
                            value="{{ old('telefono') }}" required>

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
                                @selected(old('categoria') == $categoria)>
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
                            placeholder="Ej: 15000.00"
                            class="form-control @error('limite_credito') is-invalid @enderror"
                            value="{{ old('limite_credito') }}" required>

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
                                @selected(old('dias_credito') == $dias)>
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

                        <option value="Activo" @selected(old('estado') == 'Activo')>
                            Activo
                        </option>

                        <option value="Inactivo" @selected(old('estado') == 'Inactivo')>
                            Inactivo
                        </option>

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
                           value="{{ old('fecha_registro', date('Y-m-d')) }}"
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

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i>
                    Guardar Proveedor
                </button>

            </div>

        </form>
    </div>
</div>

@endsection
