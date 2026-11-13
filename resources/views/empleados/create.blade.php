
@extends('layout.admin')

@section('titulo', 'Registrar Empleado')

@section('contenido')

<h1 class="h3 mb-4">Registrar Empleado</h1>

<div class="card shadow-sm mb-4">

    <div class="card-header">
        <i class="bi bi-person-plus"></i>
        Nuevo Empleado
    </div>

    <div class="card-body">

        <form action="{{ route('empleados.store') }}" method="POST">
            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label for="identidad" class="form-label">
                        DNI *
                    </label>

                    <input type="text"
                           name="identidad"
                           id="identidad"
                           maxlength="13"
                           pattern="[0-9]{13}"
                           placeholder="Ej: 0801199912345"
                           class="form-control @error('identidad') is-invalid @enderror"
                           value="{{ old('identidad') }}"
                           required>

                    <div class="form-text">
                        Ingrese exactamente 13 dígitos numéricos, sin guiones.
                    </div>

                    @error('identidad')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">
                        Nombre *
                    </label>

                    <input type="text"
                           name="nombre"
                           id="nombre"
                           placeholder="Ej: Juan"
                           class="form-control @error('nombre') is-invalid @enderror"
                           value="{{ old('nombre') }}"
                           required>

                    @error('nombre')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="apellido" class="form-label">
                        Apellido *
                    </label>

                    <input type="text"
                           name="apellido"
                           id="apellido"
                           placeholder="Ej: Pérez"
                           class="form-control @error('apellido') is-invalid @enderror"
                           value="{{ old('apellido') }}"
                           required>

                    @error('apellido')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="correo" class="form-label">
                        Correo Electrónico *
                    </label>

                    <input type="email"
                           name="correo"
                           id="correo"
                           placeholder="Ej: juan@disfarma.hn"
                           class="form-control @error('correo') is-invalid @enderror"
                           value="{{ old('correo') }}"
                           required>

                    @error('correo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="cargo" class="form-label">
                        Cargo *
                    </label>

                    <select name="cargo"
                            id="cargo"
                            class="form-select @error('cargo') is-invalid @enderror"
                            required>

                        <option value="">Seleccione un cargo</option>

                        @foreach([
                            'Regente Farmacéutico',
                            'Asistente de Farmacia',
                            'Jefe de Bodega',
                            'Despachador',
                            'Cajero'
                        ] as $cargo)

                            <option value="{{ $cargo }}"
                                @selected(old('cargo') == $cargo)>
                                {{ $cargo }}
                            </option>

                        @endforeach
                    </select>

                    @error('cargo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="salario" class="form-label">
                        Salario Mensual (L) *
                    </label>

                    <input type="number"
                           name="salario"
                           id="salario"
                           step="0.01"
                           min="0.01"
                           max="99999999.99"
                           placeholder="Ej: 15000.00"
                           class="form-control @error('salario') is-invalid @enderror"
                           value="{{ old('salario') }}"
                           required>

                    <div class="form-text">
                        Ingrese el sueldo base mensual en Lempiras,
                        mayor que cero y con máximo dos decimales.
                    </div>

                    @error('salario')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="fecha_ingreso" class="form-label">
                        Fecha de Ingreso *
                    </label>

                    <input type="date"
                           name="fecha_ingreso"
                           id="fecha_ingreso"
                           class="form-control @error('fecha_ingreso') is-invalid @enderror"
                           value="{{ old('fecha_ingreso', date('Y-m-d')) }}"
                           required>

                    @error('fecha_ingreso')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="estado" class="form-label">
                        Estado *
                    </label>

                    <select name="estado"
                            id="estado"
                            class="form-select @error('estado') is-invalid @enderror"
                            required>

                        <option value="">Seleccione un estado</option>

                        <option value="Activo"
                            @selected(old('estado', 'Activo') == 'Activo')>
                            Activo
                        </option>

                        <option value="Inactivo"
                            @selected(old('estado') == 'Inactivo')>
                            Inactivo
                        </option>

                    </select>

                    @error('estado')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>

            <div class="d-flex justify-content-end gap-2">

                <a href="{{ route('empleados.index') }}"
                   class="btn btn-secondary">
                    Cancelar
                </a>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i>
                    Guardar Empleado
                </button>

            </div>

        </form>
    </div>
</div>

@endsection
